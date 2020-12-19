<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
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

// Route::get('/{name?}', function ($name = null) {
//     return "Hi $name";
// });

Route::get('/user/{name}/{id}', function($name, $id){
    return "Hi $name with id $id";
});

Route::match(['GET', 'post'], '' , [HomeController::class, 'home']);
Route::get('data/', [HomeController::class, 'getData']);
Route::get('string/', [HomeController::class, 'stringPath']);
Route::match(['GET', 'POST'],'user/reg/', [HomeController::class, 'reg'])->middleware('ageCheck');
