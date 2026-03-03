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
        // $data['result'] = $model->getHporducts();
        
        $data = [
            'result' => $model->paginate(10),
            'pager' => $model->pager,
        ];



        return view('Admin/product_admin', $data);
    }
}
