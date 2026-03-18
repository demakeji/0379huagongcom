<?php

use App\Controllers\Front\Hproducts;
use App\Controllers\Front\News;
use App\Controllers\Front\Pages;
use App\Controllers\Front\Profile;
use App\Controllers\Front\Feedback;
use App\Controllers\Front\Contact;
use App\Controllers\Admin\Admin;
use App\Controllers\Admin\Product;
use App\Controllers\Admin\Upload;

/**
 * @var CodeIgniter\Router\RouteCollection $routes
 */

// --------------------------
// 后台路由（改回旧名称 admin/product_admin）
// --------------------------
$routes->get('admin', [Admin::class, 'index']);
$routes->get('admin/index_menu', [Admin::class, 'indexMenu']);
$routes->get('admin/index_body', [Admin::class, 'indexBody']);

// 产品管理（改回旧路径：admin/product_admin）
$routes->get('admin/product_admin', [Product::class, 'index']);
$routes->get('admin/product_admin/(:num)', [Product::class, 'index'], ['params' => '$1']);
$routes->get('admin/product_create', [Product::class, 'create']);
$routes->post('admin/product_admin/store', [Product::class, 'store']);
$routes->get('admin/product_edit/(:num)', [Product::class, 'edit'], ['params' => '$1']);
$routes->post('admin/product_admin/update', [Product::class, 'update']);
$routes->get('admin/product_admin/delete/(:num)', [Product::class, 'destroy'], ['params' => '$1']);

// --------------------------
// 图片上传路由
// --------------------------
$routes->match(['GET', 'POST'], 'admin/upload/image', [Upload::class, 'image']);

// --------------------------
// 前台路由
// --------------------------
$routes->get('/', [Hproducts::class, 'index']);
$routes->get('hproducts', [Hproducts::class, 'index']);
$routes->get('hproducts/(:segment)', [Hproducts::class, 'show']);
$routes->get('hproducts/detail/(:num)', [Hproducts::class, 'detail'], ['params' => '$1']);

$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']);
$routes->post('news', [News::class, 'create']);
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('profile', [Profile::class, 'index']);
$routes->get('feedback', [Feedback::class, 'index']);
$routes->get('contact', [Contact::class, 'index']);

// $routes->get('pages', [Pages::class, 'view']);
// $routes->get('(:segment)', [Pages::class, 'view']);