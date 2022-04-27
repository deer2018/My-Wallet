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

Route::get('/dashboard2', 'Admin\Dashboard2_Controller@index');


///detail
Route::get('/detail', 'Admin\DetailController@index');
//category-admin--------------
Route::get('/category', 'Admin\CategoryController@index');
Route::get('/category/create', 'Admin\CategoryController@create');
Route::post('/category', 'Admin\CategoryController@store');
Route::get('/category/{id}/edit', 'Admin\CategoryController@edit');
Route::patch('/category/{id}', 'Admin\CategoryController@update');
Route::delete('/category/{id}', 'Admin\CategoryController@destroy');

//faculty_report
Route::get('/faculty01', 'Admin\FacultyController@faculty_01');
Route::get('/faculty02', 'Admin\FacultyController@faculty_02');
Route::get('/faculty03', 'Admin\FacultyController@faculty_03');
Route::get('/faculty04', 'Admin\FacultyController@faculty_04');
Route::get('/faculty05', 'Admin\FacultyController@faculty_05');
Route::get('/faculty06', 'Admin\FacultyController@faculty_06');
Route::get('/faculty07', 'Admin\FacultyController@faculty_07');

//หน้า show_info ในหน้า faculty_report
Route::get('/faculty_show/{id}/{select_year}/01', 'Admin\Faculty_PerController@faculty_show_01');
Route::get('/faculty_show/{id}/{select_year}/02', 'Admin\Faculty_PerController@faculty_show_02');
Route::get('/faculty_show/{id}/{select_year}/03', 'Admin\Faculty_PerController@faculty_show_03');
Route::get('/faculty_show/{id}/{select_year}/04', 'Admin\Faculty_PerController@faculty_show_04');
Route::get('/faculty_show/{id}/{select_year}/05', 'Admin\Faculty_PerController@faculty_show_05');
Route::get('/faculty_show/{id}/{select_year}/06', 'Admin\Faculty_PerController@faculty_show_06');
Route::get('/faculty_show/{id}/{select_year}/07', 'Admin\Faculty_PerController@faculty_show_07');
//User----------------------------------------------------------------------------------------------------------------------------------------
Route::resource('user_personal', 'User\user_perController');

//transaction--------------------------------------------------
Route::get('/transaction', 'User\TransactionController@index');
// Route::get('/daterange', 'User\TransactionController@dateRange'); 
Route::get('/transaction/detail', 'User\TransactionController@detail');
Route::post('/transaction/detail', 'User\TransactionController@store_detail');
Route::get('/transaction/create', 'User\TransactionController@create');

Route::post('/transaction', 'User\TransactionController@store');
Route::get('/transaction/{id}/edit_inc', 'User\TransactionController@edit_inc');
Route::get('/transaction/{id}/edit_exp', 'User\TransactionController@edit_exp');
Route::patch('/transaction/{id}', 'User\TransactionController@update');
Route::delete('/transaction/{id}', 'User\TransactionController@destroy');

Route::get('/report_user', 'User\ReportController@index');
Route::get('/chart', 'User\ReportController@donutChart');
Route::get('/chart_report', 'User\ReportController@chart');

//report รายรับ เดือน 1-12
Route::get('/report_sup/{select_year}/jan_income', 'User\Report_incomeController@jan_income');
Route::get('/report_sup/{select_year}/feb_income', 'User\Report_incomeController@feb_income');
Route::get('/report_sup/{select_year}/mar_income', 'User\Report_incomeController@mar_income');
Route::get('/report_sup/{select_year}/apr_income', 'User\Report_incomeController@apr_income');
Route::get('/report_sup/{select_year}/may_income', 'User\Report_incomeController@may_income');
Route::get('/report_sup/{select_year}/jun_income', 'User\Report_incomeController@jun_income');
Route::get('/report_sup/{select_year}/jul_income', 'User\Report_incomeController@jul_income');
Route::get('/report_sup/{select_year}/aug_income', 'User\Report_incomeController@aug_income');
Route::get('/report_sup/{select_year}/sep_income', 'User\Report_incomeController@sep_income');
Route::get('/report_sup/{select_year}/oct_income', 'User\Report_incomeController@oct_income');
Route::get('/report_sup/{select_year}/nov_income', 'User\Report_incomeController@nov_income');
Route::get('/report_sup/{select_year}/dec_income', 'User\Report_incomeController@dec_income');

//report รายจ่าย เดือน 1-12
Route::get('/report_sup/{select_year}/jan_expense', 'User\Report_expenseController@jan_expense');
Route::get('/report_sup/{select_year}/feb_expense', 'User\Report_expenseController@feb_expense');
Route::get('/report_sup/{select_year}/mar_expense', 'User\Report_expenseController@mar_expense');
Route::get('/report_sup/{select_year}/apr_expense', 'User\Report_expenseController@apr_expense');
Route::get('/report_sup/{select_year}/may_expense', 'User\Report_expenseController@may_expense');
Route::get('/report_sup/{select_year}/jun_expense', 'User\Report_expenseController@jun_expense');
Route::get('/report_sup/{select_year}/jul_expense', 'User\Report_expenseController@jul_expense');
Route::get('/report_sup/{select_year}/aug_expense', 'User\Report_expenseController@aug_expense');
Route::get('/report_sup/{select_year}/sep_expense', 'User\Report_expenseController@sep_expense');
Route::get('/report_sup/{select_year}/oct_expense', 'User\Report_expenseController@oct_expense');
Route::get('/report_sup/{select_year}/nov_expense', 'User\Report_expenseController@nov_expense');
Route::get('/report_sup/{select_year}/dec_expense', 'User\Report_expenseController@dec_expense');



//---------------------------------------------------------------

Route::get('/datepicker', function () {
    return view('user.user_report.datepicker');
});