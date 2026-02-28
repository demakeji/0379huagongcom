<?php

namespace App\Controllers\Front;
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
        
        return view('Front/templates/header', $data)
            . view('Front/products/index')
            . view('Front/templates/footer');
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
