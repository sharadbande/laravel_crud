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
    return view('auth.login');
});
 

    Route::get('/Home', 'App\Http\Controllers\HomeController@Homepage');
    Route::get('/CRUD', 'App\Http\Controllers\HomeController@crud_opration');
    Route::POST('/Insertcrud', 'App\Http\Controllers\HomeController@Insert_crud');

// Ajax
    Route::GET('/ajax', 'App\Http\Controllers\HomeController@ajax_opration');
    Route::POST('/ajaxinsert', 'App\Http\Controllers\HomeController@ajaxinsert');
    Route::POST('/ajaxedit', 'App\Http\Controllers\HomeController@ajaxedit');
    Route::get('/Getemployeebyid', 'App\Http\Controllers\HomeController@edit_employee');
    Route::delete('/deleteemployee', 'App\Http\Controllers\HomeController@deleteemployee');


    Route::GET('/AutoCity', 'App\Http\Controllers\HomeController@AutoCity');




// file
    Route::GET('/File-Import', 'App\Http\Controllers\FileController@File_Import');
    Route::POST('/Import', 'App\Http\Controllers\FileController@import');
    Route::GET('/file-export', 'App\Http\Controllers\FileController@File_export');
 
 
//  login
    Route::POST('/login-auth', 'App\Http\Controllers\Auth\LoginController@login_auth');

  
    // ->name('admin.home')->middleware('is_admin');
 
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');