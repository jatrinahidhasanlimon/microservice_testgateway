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
$controller = 'GateWayController@index';
$router->get('/{any:.*}', $controller);
$router->post('/{any:.*}', $controller);
$router->put('/{any:.*}', $controller);
$router->patch('/{any:.*}', $controller);
$router->delete('/{any:.*}', $controller);


