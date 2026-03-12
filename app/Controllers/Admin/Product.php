<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HproductsModel;
use App\Models\ProductCateModel;

class Product extends BaseController
{
    protected $HproductsModel;

     public function __construct()
    {
        $this->HproductsModel = new HproductsModel();
    }

    public function index(?int $page = null)
    {
         // 1. 初始化模型和分页组件
        $model = model(HproductsModel::class);
        $pager = service('pager'); // 获取分页服务实例
        $group = 'products'; // 分页分组名（隔离不同分页）
        $perPage = 10; // 每页显示10条
        
        // 2. 优先级：URI 分段页码 > GET 参数页码 > 默认第1页
        // 手动指定 URI 分段（对应路由中的 :num 分段，序号从1开始）
        $pager->setSegment(3, $group); // 3 对应 URI 分段：admin/product/3（第3段）
        
        // 3. 获取当前页码（自动适配 URI 分段/GET 参数）
        // 如果传了 URI 分段页码，则用它；否则用 Pager 自动获取的页码
        $currentPage = $page ?? $pager->getCurrentPage($group);
        // 安全校验：页码不能小于1
        $currentPage = max(1, $currentPage);
        
        // 4. 执行分页查询（核心：指定分组，保证 Pager 数据关联）
        $products = $model->paginate($perPage, $group, $currentPage);
        
        // 5. 组装视图数据（包含分页数据、Pager 实例、当前页）
        $data = [
            'result' => $products,       // 分页后的产品列表
            'pager'  => $model->pager,   // Pager 实例（供视图渲染分页按钮）
            'page'   => $currentPage,    // 当前页码（供视图展示）
            'do'     => '',
            'perPage'=> $perPage         // 每页条数（可选）
        ];
        
        // 调试：打印当前页码（验证是否正确获取）
        // var_dump($pager->getPageURI($pager->getLastPage('products')));
        
        // 6. 加载视图并传递数据
        return view('Admin/product_admin', $data);
    }

     // 【增】展示新增表单（无分页）
    public function create()
    {   
        $data['do'] = 'add';
        $model = model(ProductCateModel::class);

        $data['prodcatelist'] = $model->getProductCate();
        $date['one'] = '';

        return view('Admin/product_admin', $data);
    }

    // 【增】提交新增数据（新增后跳转列表页，自动保留分页）
    public function store()
    {
        //临时调试：打印所有 POST 数据和验证规则（执行后看日志）
        log_message('debug', '提交的POST数据：' . print_r($this->request->getPost(), true));
        log_message('debug', '验证规则：' . print_r($this->HproductsModel->validationRules, true));

        // 1. 数据验证（失败则返回上一页，带输入和错误信息）
        if (!$this->validate($this->HproductsModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $safeTrim = function ($value) {
            return is_null($value) ? '' : trim($value);
        };

        $productData = [
            'Ptitle'    => $safeTrim($this->request->getPost('Ptitle')),
            'upload'    => $safeTrim($this->request->getPost('upload')),
            'hanliang'  => $safeTrim($this->request->getPost('hanliang')),
            'guige'     => $safeTrim($this->request->getPost('guige')),
            'Price'     => $safeTrim($this->request->getPost('price')), // 修复：POST 是 price（小写）
            'chandi'    => $safeTrim($this->request->getPost('chandi')),
            'Pcontent'  => $this->request->getPost('Pcontent') ?: '', // 富文本无需 trim，null 转空字符串
        ];

        // 调试建议：用框架日志替代 var_dump（避免影响重定向）
        // log_message('debug', '新增产品数据：' . print_r($productData, true));

        // 3. 保存数据到数据库
        $this->HproductsModel->save($productData);

        // 4. 跳转列表页，带成功提示，保留分页
        return redirect()->to('/admin/product_admin')->with('success', '产品新增成功！');
    }

    // 【改】展示编辑表单（无分页）
    public function edit(int $id)
    {
        $product = $this->HproductsModel->find($id);
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', '产品不存在！');
        }
        return view('Admin/Products/edit', ['product' => $product]);
    }

    // 【改】提交更新数据（更新后跳转列表页，保留分页）
    public function update(int $id)
    {
        if (!$this->validate($this->HproductsModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $productData = [
            'id'          => $id,
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'status'      => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
        ];

        $this->HproductsModel->save($productData);

        return redirect()->to('/admin/products')->with('success', '产品更新成功！');
    }

    // 【删】删除产品（删除后跳转列表页，保留分页）
    public function destroy(int $id)
    {
        $product = $this->HproductsModel->find($id);
        if (!$product) {
            return redirect()->to('/admin/products')->with('error', '产品不存在！');
        }

        $this->HproductsModel->delete($id);

        return redirect()->to('/admin/products')->with('success', '产品删除成功！');
    }
}
