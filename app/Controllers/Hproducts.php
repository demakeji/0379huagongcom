<?php

namespace App\Controllers;
// 第一步：强制引入Composer自动加载器（关键！）
// 路径说明：__DIR__ 是当前文件目录（app/Controllers）
// ../../ 回退到项目根目录，找到vendor/autoload.php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\Controllers\BaseController;
use App\Models\HproductsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Hproducts extends BaseController
{
    public function index(): string
    {
        $model = model(HproductsModel::class);
        $data['hproducts_list'] = $model->getHporducts();
        //var_dump($data);
        
        return view('templates/header', $data)
            . view('products/index')
            . view('templates/footer');
    }

    public function detail($id = null)
    {
        $model = model(HproductsModel::class);

        if($id != null)
        {
            $data['hproducts_list'] = $model->getHproductById($id);

            return view('templates/header', $data['hproducts_list'])
            . view('products/detail')
            . view('templates/footer');
        }
    }

    public function show(?string $title = null)
    {
        $model = model(HproductsModel::class);
        $data['hproducts_list'] = $model->getHporducts($title);

        return view('templates/header', $data)
            . view('products/detail')
            . view('templates/footer');
    }
}
