<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class About extends BaseController
{
    public function index()
    {
        
        return view('templates/header')
            . view('about/index')
            . view('templates/footer');

    }
}
