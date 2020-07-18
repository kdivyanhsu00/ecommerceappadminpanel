<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| The routes are split by logical functional domain AND version
|--------------------------------------------------------------------------
| Version 2 Hcp resouce for isntance is:
| api/v2/hcp -> Http/Controllers/Api/
| etc...
*/

$settings = [
    'namespace'  => 'API',
    'as'         => 'api.',
    'middleware' => 'auth:api'
];


# login route cannot be within middleware
Route::group(array_except($settings,'middleware'), function($route){
    $route->post('payment', 'UserController@payment');
});