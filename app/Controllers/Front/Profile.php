<?php

namespace App\Controller\Fronts;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Profile extends BaseController
{
    public function index()
    {
        return view('templates/header')
            . view('profile/index')
            . view('templates/footer');
    }
}
