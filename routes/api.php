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

Route::middleware('api')->group(function () {
    Route::get('/meu-perfil', 'API\GCCostumerController@getProfile');
    Route::post('/registrar', 'API\GCCostumerController@register');
    Route::post('/login', 'API\GCCostumerController@login');
    Route::post('/editar-perfil', 'API\GCCostumerController@updateProfile');
});
