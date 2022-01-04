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

Route::get('/import-form-product',[\App\Http\Controllers\ProductController::class,'importFormDartxtest']);//main page
Route::post('/import-product',[\App\Http\Controllers\ProductController::class,'importDartxtest'])->name('dartxtest.import');//import file
Route::get('/import-form-product',[\App\Http\Controllers\ProductController::class,'index']);//get all data but could not get data in dropdown from database,
//issue:cannot create one route with 2 get methods
Route::get('/export-excel',[\App\Http\Controllers\ProductController::class,'exportIntoExcel']);
Route::get('/export-csv',[\App\Http\Controllers\ProductController::class,'exportIntoCSV']);

//login
Route::get('/main',[App\Http\Controllers\MainController::class,'index']);
Route::post('/main/checklogin',[App\Http\Controllers\MainController::class,'checklogin']);
//Route::get('/import-form-product',[App\Http\Controllers\MainController::class,'successlogin']);


