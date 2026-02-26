<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Contact extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('contact/index')
            . view('templates/footer');
    }
}
