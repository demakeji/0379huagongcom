<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Feedback extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('feedback/index')
            . view('templates/footer');
    }
}
