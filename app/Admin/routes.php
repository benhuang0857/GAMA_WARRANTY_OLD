<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('warranty_cards', WarrantyCardController::class);
    $router->resource('products', ProductCardController::class);
    $router->resource('brands', BrandController::class);
    $router->resource('users', UserController::class);
});
