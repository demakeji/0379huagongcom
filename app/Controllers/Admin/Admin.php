<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{


    public function index()
    {
        $data['meta_title'] = "洛阳化工网";

        return view("Admin/index.php", $data);
    }

    public function indexBody()
    {
        $data['meta_title'] = "洛阳化工网";

        return view("Admin/index_body", $data);
    }

    public function indexMenu()
    {
        return view("Admin/index_menu");
    }
}
