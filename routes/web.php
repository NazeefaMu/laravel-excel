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
Route::post('/import-dartxtest',[\App\Http\Controllers\ProductController::class,'importDartxtest'])->name('dartxtest.import');//import file
Route::get('/import-form-product',[\App\Http\Controllers\DomainController::class,'index'])->name('dartxtest.import');//get domains
Route::get('/import-form-product',[\App\Http\Controllers\ProductController::class,'index'])->name('import-form-product');//get all data
Route::get('/export-excel',[\App\Http\Controllers\ProductController::class,'exportIntoExcel']);
Route::get('/export-csv',[\App\Http\Controllers\ProductController::class,'exportIntoCSV']);




