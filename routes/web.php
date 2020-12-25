<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
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

Route::group(['prefix' => 'students'], function () {
    Route::get('', [StudentController::class, 'index'])->name('student.index');
    Route::get('create/', [StudentController::class, 'create'])->name('student.create.form');
    Route::post('create/save', [StudentController::class, 'store'])->name('student.create.save');
    Route::get('view/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('edit/{id}/save', [StudentController::class, 'update'])->name('student.update');
    Route::get('delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
    Route::get('payment/',[StudentController::class, 'payment'] );
    Route::get('mail/',[StudentController::class, 'sendMail'] );
});
