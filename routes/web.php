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
Route::resource('students','App\Http\Controllers\StudentController');


Route::get('/import-form-product',[\App\Http\Controllers\ProductController::class,'importFormProducts']);//main page
//import file and send data to blade via view method
Route::post('/import-product',[\App\Http\Controllers\ProductController::class,'importProducts'])->name('product.import');
Route::get('/export-excel',[\App\Http\Controllers\ProductController::class,'exportIntoExcel']);
Route::post('/import-form-product',[\App\Http\Controllers\ProductController::class,'exportIntoCSV'])->name('product.export');
Route::post('/import-form-product/action', [App\Http\Controllers\ProductController::class,'action'])->name('tabledit.action');//for edit and delete
Route::get('product-update', [App\Http\Controllers\ProductController::class,'importProductsUpdateView']);
Route::post('product-update-all', [App\Http\Controllers\ProductController::class,'importProductsUpdate'])->name('productEdit.import');//for edit and delete

//login
Route::get('/main', [App\Http\Controllers\MainController::class,'index']);
Route::post('/main/checklogin', [App\Http\Controllers\MainController::class,'checklogin']);
Route::get('/main/successlogin', [App\Http\Controllers\MainController::class,'successlogin']);
Route::get('/main/logout', [App\Http\Controllers\MainController::class,'logout']);

//user
Route::get('add-user', [App\Http\Controllers\UserController::class,'create']);
Route::post('add-user', [App\Http\Controllers\UserController::class,'store'])->name('user.add');
Route::get('add-user', [App\Http\Controllers\UserController::class,'index']);
Route::post('/add-user/action', [App\Http\Controllers\UserController::class,'action'])->name('user.action');//for edit and delete

//domain
Route::get('add-domain', [App\Http\Controllers\DomainController::class,'index']);
Route::post('add-domain', [App\Http\Controllers\DomainController::class,'create'])->name('domain.add');
Route::post('/add-domain/action', [App\Http\Controllers\DomainController::class,'action'])->name('domain.action');//for edit and delete





