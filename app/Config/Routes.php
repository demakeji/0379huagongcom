<?php

use App\Controllers\Front\Hproducts;
use App\Controllers\Front\News;
use App\Controllers\Front\Pages;
use App\Controllers\Front\Profile;
use App\Controllers\Front\Feedback;
use App\Controllers\Front\Contact;
use App\Controllers\Admin\Admin;
use App\Controllers\Admin\Product;
use CodeIgniter\Router\FrontRouteCollection;

/**
 * @var RouteCollection $routes
 */
// 方式1：基础路由（适配 GET 参数 ?page=xxx）
$routes->get('admin/product_admin', [Product::class, 'index']);
// 方式2：URI 分段传页码（适配 admin/product/3）
$routes->get('admin/product_admin/(:num)', [Product::class, 'index/$1']);

$routes->get('admin', [Admin::class, 'index']);
$routes->get('admin/index_menu', [Admin::class, 'indexMenu']);
$routes->get('admin/index_body', [Admin::class, 'indexBody']);
$routes->get('admin/product_admin', [Product::class, 'index']);


$routes->get('/', [Hproducts::class, 'index']);
$routes->get('hproducts', [Hproducts::class, 'index']);
$routes->get('hproducts/(:segment)', [Hproducts::class, 'show']);
$routes->get('hproducts/detail/(:num)', [[Hproducts::class, 'detail'], '$1']);

$routes->get('news', [News::class,'index']);
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('profile', [Profile::class, 'index']);

$routes->get('feedback', [Feedback::class, 'index']);

$routes->get('contact', [Contact::class, 'index']);

// $routes->get('pages', [Pages::class, 'view']);
// $routes->get('(:segment)', [Pages::class, 'view']);
