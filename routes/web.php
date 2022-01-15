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
Route::get('/admin_user_report/{id}', 'Admin\Admin_User_ReportController@report');

//dashboard-admin
Route::get('/dashboard', 'Admin\Admin_DashboardController@index');


//category-admin--------------
Route::get('/category', 'Admin\CategoryController@index');
Route::get('/category/create', 'Admin\CategoryController@create');
Route::post('/category', 'Admin\CategoryController@store');
Route::get('/category/{id}/edit', 'Admin\CategoryController@edit');
Route::patch('/category/{id}', 'Admin\CategoryController@update');
Route::delete('/category/{id}', 'Admin\CategoryController@destroy');


//User----------------------------------------------------------------------------------------------------------------------------------------
Route::resource('user_personal', 'User\user_perController');

//transaction--------------------------------------------------
Route::get('/transaction', 'User\TransactionController@index');
Route::get('/transaction/create', 'User\TransactionController@create');
Route::post('/transaction', 'User\TransactionController@store');
Route::get('/transaction/{id}/edit_inc', 'User\TransactionController@edit_inc');
Route::get('/transaction/{id}/edit_exp', 'User\TransactionController@edit_exp');
Route::patch('/transaction/{id}', 'User\TransactionController@update');
Route::delete('/transaction/{id}', 'User\TransactionController@destroy');

Route::get('/report_user', 'User\ReportController@index');
Route::get('/chart', 'User\ReportController@donutChart');
Route::get('/chart_report', 'User\ReportController@chart');

//---------------------------------------------------------------

Route::get('/datepicker', function () {
    return view('user.user_report.datepicker');
});