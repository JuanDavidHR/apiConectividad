<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->get('/key', function ()  {
    return 'str_random(length: 32)';
});
$router->get('/categories', 'CategoriesController@index');
$router->get('/categories/{id}', 'CategoriesController@getCategories');
$router->post('/categories', 'CategoriesController@createCategories');
$router->put('/categories/{id}', 'CategoriesController@updateCategories');
$router->delete('/categories/{id}', 'CategoriesController@destroyCategories');

$router->group(['prefix' => 'api'], function () use ($router) {
    // Matches "/api/register
    $router->post('register', 'AuthController@register');
    // Matches "/api/login
    $router->post('login', 'AuthController@login');
    // Matches "/api/profile
    $router->get('profile', 'UserController@profile');

    // Matches "/api/users/1 
    //get one user by id
    $router->get('users/{id}', 'UserController@singleUser');

    // Matches "/api/users
    $router->get('users', 'UserController@allUsers');
    $router->get('logout', 'UserController@logout');
    // Matches "/api/rol
    $router->get('/rol', 'RolController@index');
    $router->get('/rol/{id}', 'RolController@getRol');
    $router->post('/rol', 'RolController@createRol');
    $router->put('/rol/{id}', 'RolController@updateRol');
    $router->delete('/rol/{id}', 'RolController@destroyRol');
    // Matches "/api/area
    $router->get('/area', 'AreaController@index');
    $router->get('/area/{id}', 'AreaController@getArea');
    $router->post('/area', 'AreaController@createArea');
    $router->put('/area/{id}', 'AreaController@updateArea');
    $router->delete('/area/{id}', 'AreaController@destroyArea');
    // Matches "/api/tipo
    $router->get('/tipo', 'TipoController@index');
    $router->get('/tipo/{id}', 'TipoController@getTipo');
    $router->post('/tipo', 'TipoController@createTipo');
    $router->put('/tipo/{id}', 'TipoController@updateTipo');
    $router->delete('/tipo/{id}', 'TipoController@destroyTipo');
    // Matches "/api/persona
    $router->get('/persona', 'PersonaController@index');
    $router->get('/persona/{id}', 'PersonaController@getPersona');
    $router->post('/persona/store', 'PersonaController@store');
});
