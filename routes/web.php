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

Route::get('/{name?}', function ($name = null) {
    return "Hi $name";
});

Route::get('/user/{name}/{age}', function($name, $age){
    return "Hi $name with age $age";
})->where('name', '[A-z]+')->where('age','[0-9]+');
