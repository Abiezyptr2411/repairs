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

// Cart API Routing
$route['api/add_to_cart'] = 'api/add_cart_item';
$route['api/get_cart'] = 'api/get_cart';
$route['api/update/(:any)'] = 'api/update_cart/$1';
$route['api/delete/(:any)'] = 'api/delete_cart_item/$1';

// Service Orders API Routing
$route['api/get_orders'] = 'api/get_all_orders';
$route['api/get_orders_users'] = 'api/get_orders_by_user_id';
$route['api/create_service_orders'] = 'api/create_service_order';

// Products Orders API Routing
$route['api/get_orders_product_users'] = 'api/get_orders_product_by_user_id';
$route['api/create_service_orders'] = 'api/create_service_order';
$route['api/product/delete/(:any)'] = 'api/delete_product/$1';

// Vouchers API Routing
$route['api/get_coupons'] = 'api/get_coupons';
$route['api/get_coupons_user/(:num)'] = 'api/get_coupons_by_user_id/$1';
$route['api/create_coupon'] = 'api/create_coupon';
$route['api/update_coupon/(:any)'] = 'api/update_coupon/$1';
$route['api/delete_coupon/(:any)'] = 'api/delete_coupon/$1';
