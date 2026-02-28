<?php

namespace App\Controllers\Admin\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        return view("Admin/idnex.php");
    }
}
