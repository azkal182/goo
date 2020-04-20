<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('layouts.master');
});

Route::get('/user', function () {
    return view('user');
});


Route::get('/voucher', function () {
    return view('voc');
});

Route::get('/flogin', function () {
    return view('flogin');
});

Route::get('/fregister', function () {
    return view('fregister');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
