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

// $router->get('/', function () use ($router) {
//     return $router->app->version();
// });


$router->get('/all_country', 'CountryController@index');
$router->post('/country', 'CountryController@create');
$router->get('/country/{id}', 'CountryController@show');
$router->post('/country/{id}', 'CountryController@update');
$router->delete('/country/{id}', 'CountryController@destroy');

$router->get('/all_state', 'StateController@index');
$router->post('/state', 'StateController@create');
$router->get('/state/{id}', 'StateController@show');
$router->post('/state/{id}', 'StateController@update');
$router->delete('/state/{id}', 'StateController@delete_state');

$router->get('/all_city', 'CityController@index');
$router->post('/city', 'CityController@create');
$router->get('/city/{id}', 'CityController@show');
$router->post('/city/{id}', 'CityController@update');
$router->delete('/city/{id}', 'CityController@destroy');


$router->get('/all_project','ProjectController@index');
$router->get('/inhouse_projects','ProjectController@get_inhouse_projects');
$router->get('/client_projects','ProjectController@get_client_projects');
$router->post('/project','ProjectController@create');
$router->get('/project/{id}','ProjectController@show');
$router->post('/project/{id}','ProjectController@update');
$router->delete('/project/{id}','ProjectController@destroy');
