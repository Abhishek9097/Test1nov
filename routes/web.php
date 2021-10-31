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
    return redirect('login');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function(){

    Route::resource('company', 'App\Http\Controllers\CompanyController');
    Route::post('company/update', 'App\Http\Controllers\CompanyController@update');
    Route::get('company/delete/{id}', 'App\Http\Controllers\CompanyController@destroy');

    Route::resource('employees', 'App\Http\Controllers\EmployeesController');
    Route::post('employees/update', 'App\Http\Controllers\EmployeesController@update');
    Route::get('employees/delete/{id}', 'App\Http\Controllers\EmployeesController@destroy');
});