<?php

declare(strict_types = 1);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// $router->group(['prefix' => 'product'], function () use ($router) {
// dd('what');
    $controller = 'ProductController@new_index';

//     $router->get('/{route:.*}/', $controller);
//     $router->post('/{route:.*}/', $controller);
//     $router->put('/{route:.*}/', $controller);
//     $router->patch('/{route:.*}/', $controller);
//     $router->delete('/{route:.*}/', $controller);

// });
// $router::before(function($request) {
//     //put your routes here
// });
// $router->get('/{all:.*}', function() {
//     // return view('app');
// });
// $router->get('/api/order', ['uses' => 'OrderController@index']);
// $router->any('{slug}', function($slug)
// {
//     //do whatever you want with the slug
// })->where('slug', '([A-z\d-\/_.]+)?');
// $router->get('/product', ['uses' => 'ProductController@new_index']);
// $router->get('/product/{any}', ['uses' => 'ProductController@new_index']);
// $router->get('/check/{any}', ['uses' => 'ProductController@new_index']);

$router->get('/{any:.*}', $controller);
$router->post('/{any:.*}', $controller);
//   $router->post('/{any:.*}', function ($any) use ($router) {
//     //
//     dd('here');
//   });
//   $router->delete('/{any:.*}', function ($any) use ($router) {
//     //
//     dd('here');
//   });
// $router->group(['prefix' => 'api', 'middleware' => ['client.credentials']], function () use ($router) {

    // $router->group(['prefix' => 'product'], function () use ($router) {
    //     $router->get('/', ['uses' => 'ProductController@index']);
    //     $router->post('/', ['uses' => 'ProductController@store']);
    //     $router->get('/{product}', ['uses' => 'ProductController@show']);
    //     $router->patch('/{product}', ['uses' => 'ProductController@update']);
    //     $router->delete('/{product}', ['uses' => 'ProductController@destroy']);
    // });

    // $router->group(['prefix' => 'order'], function () use ($router) {
    //     $router->get('/', ['uses' => 'OrderController@index']);
    //     $router->post('/', ['uses' => 'OrderController@store']);
    //     $router->get('/{order}', ['uses' => 'OrderController@show']);
    //     $router->patch('/{order}', ['uses' => 'OrderController@update']);
    //     $router->delete('/{order}', ['uses' => 'OrderController@destroy']);
    // });

// });

