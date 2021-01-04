<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ImageController;

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
    Route::get('search/', [StudentController::class, 'search']);
    Route::get('auto/', [StudentController::class, 'autoComplete'])->name('student.autocomplete');
    Route::get('create/', [StudentController::class, 'create'])->name('student.create.form');
    Route::post('create/save', [StudentController::class, 'store'])->name('student.create.save');
    Route::get('view/{id}', [StudentController::class, 'show'])->name('student.show');
    Route::get('edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('edit/{id}/save', [StudentController::class, 'update'])->name('student.update');
    Route::get('delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
    Route::get('payment/',[StudentController::class, 'payment'] );
    Route::get('mail/',[StudentController::class, 'sendMail'] );
    Route::get('download-excel/', [StudentController::class, 'downloadAsExcel']);
    Route::get('download-csv/', [StudentController::class, 'downloadAsCsv']);
    Route::get('download-pdf/', [StudentController::class, 'downloadAsPdf']);
    Route::get('upload/', [StudentController::class, 'uploadCsv']);
    Route::post('upload/save', [StudentController::class, 'uploadCsvSave'])->name('student.upload.save');
    Route::get('contact/', [StudentController::class, 'contact'])->name('student.contact');
    Route::post('contact/process/', [StudentController::class, 'contactSave'])->name('student.contact.save');
    Route::get('test/', [StudentController::class, 'test']);
});

Route::get('resize', [ImageController::class, 'resizeImage']);
Route::post('resize/process', [ImageController::class, 'resizeImageProcess'])->name('resizeImage');
Route::post('upload/dropzone/save', [ImageController::class, 'dropZone'])->name('dropZone');
Route::get('gallery/', [ImageController::class, 'gallery']);

Route::group(['prefix' => 'customer'], function(){
    Route::get('',[CustomerController::class, 'index']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
