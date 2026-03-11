<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HproductsModel;

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

        return view('Admin/product_admin', $data);
    }

    // 【增】提交新增数据（新增后跳转列表页，自动保留分页）
    public function store()
    {
        if (!$this->validate($this->HproductsModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $productData = [
            'name'        => $this->request->getPost('name'),
            'price'       => $this->request->getPost('price'),
            'status'      => $this->request->getPost('status'),
            'description' => $this->request->getPost('description'),
        ];

        $this->HproductsModel->save($productData);

        // 跳转列表页，自动保留当前分页（比如新增后回到第3页）
        return redirect()->to('/admin/products')->with('success', '产品新增成功！');
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
