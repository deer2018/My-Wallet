<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin----------------------------------------------------------------------------------------------------------------------------------------

Route::resource('admin_user', 'Admin\Admin_UserController');



//User----------------------------------------------------------------------------------------------------------------------------------------
Route::resource('user_personal', 'User\user_perController');

//transaction--------------------------------------------------
Route::get('/transaction', 'User\TransactionController@index');
Route::get('/transaction/create', 'User\TransactionController@create');
Route::post('/transaction', 'User\TransactionController@store');
Route::get('/transaction/{id}/edit', 'User\TransactionController@edit');
Route::patch('/transaction/{id}', 'User\TransactionController@update');
Route::delete('/transaction/{id}', 'User\TransactionController@destroy');

Route::get('/report_user', 'User\ReportController@index');
Route::get('/chart', 'User\ReportController@donutChart');

//---------------------------------------------------------------