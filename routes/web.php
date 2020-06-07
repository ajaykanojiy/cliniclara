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
    return view('admin/comman/master1');
});



Route::view('log_form','login_form');

Route::get('/logout',function(){
	session()->forget('sess');
	return redirect('log_form');
});
Route::POST('login','LoginCreateController@admin_login');

Route::group(['middleware'=>['custumauth']],function(){
// Route::view('dash','admin.comman.section');
	Route::get('/dash', function () {
    return view('admin/comman/dash');
});


	Route::resource('login_create','LoginCreateController');
	Route::resource('doctor','DoctorController');
	Route::POST('schedule','DoctorController@schedule');
	Route::get('schedule_edit/{id}','DoctorController@schedule_edit');
	Route::DELETE('schedule_del/{id}','DoctorController@schedule_del');
	
	Route::resource('service','ServiceController');
    
    Route::POST('vital','ServiceController@vital_store');
	Route::get('vital_edit/{id}','ServiceController@vital_edit');
	Route::DELETE('vital_del/{id}','ServiceController@vital_del');

	Route::view('de','d');


	Route::resource('pres','PrescriptionController');


	Route::POST('test_group','PrescriptionController@test_group_store');
	Route::get('test_group_edit/{id}','PrescriptionController@test_group_edit');
	Route::DELETE('test_group_del/{id}','PrescriptionController@test_group_del');

	Route::POST('medi_group','PrescriptionController@medi_group_store');
	Route::get('medi_group_edit/{id}','PrescriptionController@medi_group_edit');
	Route::DELETE('medi_group_del/{id}','PrescriptionController@medi_group_del'); 


	Route::POST('advice_group','PrescriptionController@advice_group_store');
	Route::get('advice_group_edit/{id}','PrescriptionController@advice_group_edit');
	Route::DELETE('advice_group_del/{id}','PrescriptionController@advice_group_del'); 

	Route::POST('diet_group','PrescriptionController@diet_group_store');
	Route::get('diet_group_edit/{id}','PrescriptionController@diet_group_edit');
	Route::DELETE('diet_group_del/{id}','PrescriptionController@diet_group_del'); 

    Route::POST('medicines','ServiceController@medicines_store');
	Route::get('medicines_edit/{id}','ServiceController@medicines_edit');
	Route::DELETE('medicines_del/{id}','ServiceController@medicines_del'); 


	 Route::POST('medi_time','ServiceController@medi_time_store');
	Route::get('medi_time_edit/{id}','ServiceController@medi_time_edit');
	Route::DELETE('medi_time_del/{id}','ServiceController@medi_time_del'); 


	Route::resource('patient','PatientController');
	Route::POST('change_status','PatientController@change_status');
});
