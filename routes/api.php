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
Route::post('main_category','quiz_controller@main_category');
Route::post('main_display','quiz_controller@main_display');

Route::post('sub_category','quiz_controller@sub_category');
Route::post('sub_display','quiz_controller@sub_display');

Route::post('ss_category','quiz_controller@ss_category');
