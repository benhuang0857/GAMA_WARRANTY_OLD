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
    $router->resource('gama_point_logs', GamaPointLogController::class);
    $router->resource('gama_trans_logs', GamaTransLogController::class);
    $router->resource('for_check_warranties', CheckWarrantyController::class);
    $router->resource('point_products', PointProductController::class);
    $router->resource('gama_stores', GAMAStoreController::class);
    $router->resource('series', SeriesController::class);
});
