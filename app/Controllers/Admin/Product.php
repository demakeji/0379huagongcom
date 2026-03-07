<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HproductsModel;

class Product extends BaseController
{
    public function index(int $page = 2)
    {
        $model = model(HproductsModel::class);
        
        $data = [
        'result' => $model->paginate(10, 'products', $page),
        'pager' =>$model->pager,
        'page' => $page,
        'do' => '',
        ];
   
        return view('Admin/product_admin', $data);
    }
}
