<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Feedback extends BaseController
{
    public function index()
    {
        return view('Front/templates/header')
            . view('Front/feedback/index')
            . view('Front/templates/footer');
    }
}
