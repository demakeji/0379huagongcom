<?php

namespace App\Controllers\Front;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        return view('Front/templates/header')
            . view('Front/profile/index')
            . view('Front/templates/footer');
    }
}
