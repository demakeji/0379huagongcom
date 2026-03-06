<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\HproductsModel;

class Product extends BaseController
{
    public function index()
    {
        $model = model(HproductsModel::class);
        //当前页码
        //$page = 5;

        $data = [
        'result' => $model->paginate(10),
        'pager' => $model->pager,
        'do' => '',
        ];
        var_dump($data['pager']);

        return view('Admin/product_admin', $data);
    }
}
