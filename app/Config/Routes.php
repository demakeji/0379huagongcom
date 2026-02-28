<?php

use App\Controllers\Front\Hproducts;
use App\Controllers\Front\News;
use App\Controllers\Front\Pages;
use CodeIgniter\Router\FrontRouteCollection;

use App\Controllers\Admin\Admin;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'home::index');
$routes->get('/', [Hproducts::class, 'index']);
$routes->get('hproducts', [Hproducts::class, 'index']);
$routes->get('hproducts/(:segment)', [Hproducts::class, 'show']);
$routes->get('hproducts/detail/(:num)', [[Hproducts::class, 'detail'], '$1']);

$routes->get('news', 'News::index');
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('profile', 'Profile::index');

$routes->get('feedback', 'Feedback::index');

$routes->get('contact', 'Contact::index');

$routes->get('pages', [Pages::class, 'view']);
$routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('admin', [Admin::class, 'index']);