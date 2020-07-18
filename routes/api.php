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
Route::get('/IngEgre/{id}/SubConsepto', 'RegIngEgrController@getSubCon');

Route::get('/IngEgre/{id}/SubConsepto2', 'RegIngEgrController@getSubCon2');

Route::get('/IngEgre/{id}/SubConseptoA', 'RegIngEgrController@getSubConA');

Route::get('/IngEgre/{id}/SubConseptoA2', 'RegIngEgrController@getSubConA2');
