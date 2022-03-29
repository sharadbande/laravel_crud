<?php

use Illuminate\Support\Facades\Route;
 
use App\Http\Middleware\IsAdmin;
 
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
    if(Auth::check())
    {  
        return redirect('AdminHome');
    }
     
    return view('auth.login');
});
 
 

 
 
//  login
    Route::get('/login_View', 'App\Http\Controllers\Auth\LoginController@loginView')->name('login_View'); 
    Route::POST('/login-auth', 'App\Http\Controllers\Auth\LoginController@login_auth'); 
    Route::get('SignoutUser', 'App\Http\Controllers\HomeController@SignoutUser')->name('SignoutUser'); 

    

Route::middleware([is_admin::class])->group(function()
{
//HOME****************************
        Route::get('AdminHome', 'App\Http\Controllers\HomeController@Homepage')->name('AdminHome'); 

//FILE****************************
        Route::GET('/File-Import', 'App\Http\Controllers\FileController@File_Import');
        Route::POST('/Import', 'App\Http\Controllers\FileController@import');
        Route::GET('/file-export', 'App\Http\Controllers\FileController@File_export');
        Route::get('/CRUD', 'App\Http\Controllers\HomeController@crud_opration');
        Route::POST('/Insertcrud', 'App\Http\Controllers\HomeController@Insert_crud');

//Ajax******************************
        Route::GET('/ajax', 'App\Http\Controllers\HomeController@ajax_opration');
        Route::POST('/ajaxinsert', 'App\Http\Controllers\HomeController@ajaxinsert');
        Route::POST('/ajaxedit', 'App\Http\Controllers\HomeController@ajaxedit');
        Route::get('/Getemployeebyid', 'App\Http\Controllers\HomeController@edit_employee');
        Route::delete('/deleteemployee', 'App\Http\Controllers\HomeController@deleteemployee');


//Auto City******************************
        Route::GET('/AutoCity', 'App\Http\Controllers\HomeController@AutoCity');

 });