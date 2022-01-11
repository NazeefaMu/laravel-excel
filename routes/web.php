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

//employee test
Route::get('/import-form',[\App\Http\Controllers\EmployeeController::class,'importForm']);
Route::post('/import',[\App\Http\Controllers\EmployeeController::class,'import'])->name('employee.import');
Route::get('/import-form',[\App\Http\Controllers\EmployeeController::class,'index']);

Route::get('/import-form-product',[\App\Http\Controllers\ProductController::class,'importFormProducts']);//main page
//import file and send data to blade via view method
Route::post('/import-product',[\App\Http\Controllers\ProductController::class,'importProducts'])->name('product.import');
Route::get('/export-excel',[\App\Http\Controllers\ProductController::class,'exportIntoExcel']);
Route::post('/import-form-product',[\App\Http\Controllers\ProductController::class,'exportIntoCSV'])->name('product.export');

//login
Route::get('/main',[App\Http\Controllers\MainController::class,'index']);
Route::post('/login-successful',[App\Http\Controllers\MainController::class,'checklogin']);
//Route::get('/import-form-product',[App\Http\Controllers\MainController::class,'successlogin']);

Route::get('/main', [App\Http\Controllers\MainController::class,'index']);
Route::post('/main/checklogin', [App\Http\Controllers\MainController::class,'checklogin']);
Route::get('/main/successlogin', [App\Http\Controllers\MainController::class,'successlogin']);


Route::post('/import-form-product/action', [App\Http\Controllers\ProductController::class,'action'])->name('tabledit.action');



