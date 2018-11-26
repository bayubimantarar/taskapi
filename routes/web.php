<?php

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'tasks'], function() use ($router) {
    $router->get('/', [
        'as' => 'tasks', 
        'uses' => 'TaskController@index'
    ]);
    $router->get('/{id}', [
        'as' => 'tasks', 
        'uses' => 'TaskController@show'
    ]);
    $router->post('/create', [
        'as' => 'tasks', 
        'uses' => 'TaskController@store'
    ]);
});
