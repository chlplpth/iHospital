<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/addDepartment', function () {
    return view('admin/addDepartment');
});

Route::get('/addMedicine', function () {
    return view('admin/addMedicine');
});

Route::get('/addStaff', function () {
    return view('admin/addStaff');
});

Route::get('/grantStaff', function () {
    return view('admin/grantStaff');
});

Route::get('/mainPharmacist', function () {
    return view('pharmacist/main');
});

Route::get('/recordPrescriptionHistory', function () {
    return view('pharmacist/recordPrescriptionHistory');
});

Route::get('/findPatient', function () {
    return view('pharmacist/findPatient');
});