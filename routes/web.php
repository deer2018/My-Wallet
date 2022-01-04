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
Route::get('/transaction/income', 'User\TransactionController@income');
Route::get('/transaction/expense', 'User\TransactionController@expense');
Route::post('/transaction', 'User\TransactionController@store');
Route::get('/transaction/{id}/edit_income', 'User\TransactionController@edit_income');
Route::get('/transaction/{id}/edit_expense', 'User\TransactionController@edit_expense');
Route::put('/transaction/{id}', 'User\TransactionController@update');
Route::delete('/transaction/{id}', 'User\TransactionController@destroy');


//---------------------------------------------------------------