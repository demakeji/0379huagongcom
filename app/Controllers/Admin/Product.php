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
        
        $pager = service('pager');

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 10;
        $total   = 200;

        // Call makeLinks() to make pagination links.
        $pager_links = $pager->makeLinks($page, $perPage, $total);

        $data = [
            // ...
            'pager_links' => $pager_links,
        ];

        return view('Admin/product_admin', $data);
    }
}
