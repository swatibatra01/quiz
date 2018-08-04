<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('quizdata','quiz_controller@quiz_getdata');
Route::get('quiz_send_data','quiz_controller@quiz_send_data');

