<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function index()
    {
        return view("Admin/index.php")
        .view("Admin/indexBody.php")
        .view("Admin/indexMenu.php");
        
    }
}
