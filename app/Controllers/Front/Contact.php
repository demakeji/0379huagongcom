<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function index()
    {
        return view('Front/templates/header')
            . view('Front/contact/index')
            . view('Front/templates/footer');
    }
}
