<?php
require_once "App/Config/database.php";
require_once "vendor/autoload.php";
require_once"App/Config/config.php";
use App\Routing\Route;
    Route::add('/', 'HomeController@index');
    Route::add('/index', 'HomeController@index');
    Route::add('/product', 'ProductController@index');
    Route::add('/product/cart', 'ProductController@Product_Cart');
    Route::add('/cart/deleteId/(\d+)', 'ProductController@Delete_CartId');
    Route::add('/cart/soLuongId/(\d+)/(\w+)', 'ProductController@update_soluong');
    Route::add('/cart/deleteallcart', 'ProductController@deleteall');
    Route::add('/contact', 'HomeController@contact');
    Route::add('/blog', 'HomeController@blog');
    Route::add('/catagory/(\d+)', 'ProductController@index');
    Route::add('/product/detail/(\d+)', 'ProductController@detail');
    Route::add('/product/search/(\w+)', 'ProductController@index');
    Route::add('/user/login', 'UserController@login');
    Route::add('/user/logout', 'UserController@logout');
    Route::add('/user/dangky', 'UserController@dangky');
    Route::add('/product/checkout', 'ProductController@checkout');
    Route::add('/order/vieworder', 'ProductController@vieworder');
    Route::add('/product/soluong/(\d+)/(\w+)', 'ProductController@update_soluong');
    
    Route::add('/admin', 'AdminController@index');

    Route::add('/admin/catagory', 'AdminController@catagory');
    Route::add('/admin/addcatagoryform', 'AdminController@addcatagoryform');
    Route::add('/admin/addcatagory', 'AdminController@addcatagory');
    Route::add('/admin/catagory/update', 'AdminController@catagoryupdate');
    Route::add('/admin/catagory/delete/(\d+)', 'AdminController@catagorydelete');

    Route::add('/admin/addproductform', 'AdminController@addproductform');
    Route::add('/admin/product', 'AdminController@product');
    Route::add('/admin/addproduct', 'AdminController@addproduct');


    
    Route::add('/admin/oder', 'AdminController@oder');
    Route::add('/admin/user', 'AdminController@user');

   
   
    $uri = isset($_GET['url']) ? "/".rtrim($_GET['url'], '/') : '/index';
    Route::dispatch($uri);
    