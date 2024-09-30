<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Authentication API Routing
$route['api/login'] = 'api/login';
$route['api/register'] = 'api/register';
$route['api/get_users'] = 'api/get_users';
$route['api/logout'] = 'api/logout';
$route['api/user/delete/(:any)'] = 'api/delete_user/$1';

// Product API Routing
$route['api/get_product_oil'] = 'api/get_produk_oil';
$route['api/get_product_engine'] = 'api/get_produk_engine';
$route['api/createProduct'] = 'api/create_product';
$route['api/product/delete/(:any)'] = 'api/delete_product/$1';

// Service Orders API Routing
$route['api/get_orders'] = 'api/get_all_orders';
$route['api/get_orders_users'] = 'api/get_orders_by_user_id';
$route['api/create_service_orders'] = 'api/create_service_order';
$route['api/product/delete/(:any)'] = 'api/delete_product/$1';

// Products Orders API Routing
// $route['api/get_orders_products'] = 'api/get_all_orders_products';
$route['api/get_orders_product_users'] = 'api/get_orders_product_by_user_id';
$route['api/create_service_orders'] = 'api/create_service_order';
$route['api/product/delete/(:any)'] = 'api/delete_product/$1';
