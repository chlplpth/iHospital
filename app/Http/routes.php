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

// Route::get('/home', 'appointmentController@home');

Route::get('/index', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('general/register');
});


Route::get('/changePassword', function () {
    return view('general/changePassword');
});

Route::get('/forgetPassword', function () {
    return view('general/forgetPassword');
});

Route::get('mainStaff', function() {
    return view('staff/mainStaff');
});

Route::get('mainPatient', function() {
    return view('patient/mainPatient');
});

Route::get('createAppointmentForPatient', function() {
    return view('staff/createAppointmentForPatient');
});

Route::get('diagnosisRecord', function() {
    return view('patient/diagnosisRecord');
});

Route::get('diagnosisRecord2', function() {
    return view('patient/diagnosisRecord2');
});

Route::get('rescheduleAppointment', function() {
    return view('patient/rescheduleAppointment');
});

Route::get('confirmAppointment', function() {
    return view('patient/confirmAppointment');
});

Route::get('cancelAppointment', function() {
    return view('patient/cancelAppointment');
});

Route::get('manageAppointmentForPatient', function() {
    return view('staff/manageAppointmentForPatient');
});

Route::get('doctorScheduleByStaff', function() {
    return view('staff/doctorScheduleByStaff');
});

Route::get('doctorList', function () {
    return view('patient/doctorList');
});
Route::post('doctorList','userController@searchDoctor');

Route::get('addStaffByStaff', function() {
    return view('staff/addStaffByStaff');
});

Route::get('manageStaffByStaff', function() {
    return view('staff/manageStaffByStaff');
});
Route::post('manageStaffByStaff','userController@searchStaff');
Route::post('manageStaffEdit','userController@editStaff');
Route::post('manageStaffDelete','userController@deleteStaff');


Route::get('searchPatientProfileByStaff', function() {
    return view('staff/searchPatientProfileByStaff');
});

Route::get('searchDoctorScheduleByStaff', function() {
    return view('staff/searchDoctorScheduleByStaff');
});

Route::get('patientAppointmentSchedule', function() {
    return view('patient/patientAppointmentSchedule');
});

Route::get('mainAdmin', function () {
    return view('admin/mainAdmin');
});

Route::get('/addDepartment', function () {
    return view('admin/addDepartment');
});

Route::post('/addDepartment','departmentController@addDepartment');


// addmedicine
Route::get('/addMedicine', function () {
    return view('admin/addMedicine');
});


Route::post('/addMedicine','medicineController@addmedicine');



Route::get('/addStaffByAdmin', function () {
    return view('admin/addStaffByAdmin');
});

Route::get('/grantStaff', function () {
    return view('admin/grantStaff');
});

Route::get('/mainPharmacist', function () {
    return view('pharmacist/mainPharmacist');
});

Route::get('/recordPrescriptionHistory', function () {
    return view('pharmacist/recordPrescriptionHistory');
});

Route::get('/searchPatientProfileByPharmacist', function () {
    return view('pharmacist/searchPatientProfileByPharmacist');
});

Route::get('/mainNurse', function () {
    return view('nurse/mainNurse');
});

Route::get('/recordPatientGeneralDetail', function () {
    return view('nurse/recordPatientGeneralDetail');
});

Route::get('/searchPatientProfileByNurse', function () {
    return view('nurse/searchPatientProfileByNurse');
});

Route::get('/doctorScheduleByNurse', function () {
    return view('nurse/doctorScheduleByNurse');
});

Route::get('/mainDoctor', function () {
    return view('doctor/mainDoctor');
});

Route::get('/diagnose', function () {
    return view('doctor/diagnose');
});

Route::get('/showDiagnosisHistory', function () {
    return view('doctor/showDiagnosisHistory');
});

Route::get('sendemail', function () {
    $data = array(
        'name' => "Noon",
        );
    

    Mail::send('emails.createStaffEmail',$data,function ($message) {

        $message->from('ihospital.se@gmail.com', 'iHospital');

        $message->to('tonkung49031@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

Route::get('/doctorAppointmentSchedule', function () {
    return view('doctor/doctorAppointmentSchedule');
});

Route::get('/searchPatientProfileByDoctor', function () {
    return view('doctor/searchPatientProfileByDoctor');
});

Route::get('/doctorScheduleByDoctor', function () {
    return view('doctor/doctorScheduleByDoctor');
});

Route::get('/doctorAppointmentSchedule', function () {
    return view('doctor/doctorAppointmentSchedule');
});

Route::get('/diagnosisHistory', function () {
    return view('doctor/diagnosisHistory');
});

// ================= PATIENT =================

Route::get('patientProfile', 'userController@viewMyProfilePatient');
Route::get('editProfile', 'userController@editMyProfilePatientShow');
Route::post('editProfile', 'userController@editMyProfilePatientStore');

Route::get('createAppointment', 'appointmentController@createAppointmentShow');

// ================= DOCTOR =================



// ================= STAFF =================

Route::get('/addPatient', function() {
    return view('staff.addPatient');
});
Route::post('/addPatient', 'userController@addPatient');

Route::get('/addStaffByStaff', 'userController@addHospitalStaffShow');
Route::post('/addStaffByStaff', 'userController@addHospitalStaffStore');

Route::get('/importDoctorSchedule/', function() {
    return view('staff.importDoctorSchedule');
});
Route::get('/importDoctorSchedule/{userId}', 'scheduleController@importScheduleShow');
Route::post('/importDoctorSchedule', 'scheduleController@importScheduleStore');

// ================= ADMIN =================

Route::post('/addDepartment', 'departmentController@addDepartment');
Route::get('/addStaffByAdmin', 'userController@addHospitalStaffByAdminShow');
Route::post('/addStaffByAdmin', 'userController@addHospitalStaffByAdminStore');

// ================= AUTHENTICATE =================

Route::get('/', 'Auth\AuthController@getMainPage');
Route::get('/logout', 'Auth\AuthController@logout');

Route::post('/login', 'Auth\AuthController@authenticate');
Route::post('/register', 'userController@checkPatientStatus');
Route::post('/registerOld', 'userController@registerOldPatient');
Route::post('/registerNew', 'userController@registerNewPatient');

Route::get('/genPassword/{text}', 'Auth\AuthController@genPassword');
Route::get('/testModel', 'Auth\AuthController@testModel');


Route::post('/forgetPassword', 'Auth\AuthController@forgetPassword');
Route::get('/changePassword/{verifyCode}', 'Auth\AuthController@changePasswordGet');
Route::post('/changePassword', 'Auth\AuthController@changePasswordPost');


Route::get('/testSearch', function() {
    return view('testSearch');
});
Route::get('/api/search', 'searchController@searchImportDoctorSchedule');
Route::get('/search/importDoctorSchedule', 'searchController@searchImportDoctorSchedule');
// ================= FOR SMURF CONTROLLER (VALIDATION) ============================
// Route::post('/editProfile', 'SmurfController@editProfileValidate');
// Route::post('/createAppointment', 'SmurfController@createAppointmentValidate');
// Route::post('/doctorList', 'SmurfController@doctorListValidate');

// ================= FOR SMURF CONTROLLER (VALIDATION) ============================
// ================= Patient ==================

// Route::post('/editProfile', 'SmurfController@editProfileValidate');
// Route::post('/createAppointment', 'SmurfController@createAppointmentValidate');
// //Route::post('/doctorList', 'SmurfController@doctorListValidate');
// // ================= Admin ====================
// //Route::post('/addDepartment', 'SmurfController@addDepartmentValidate');
// //Route::post('/addMedicine', 'SmurfController@addMedicineValidate');
// Route::post('/addStaffByAdmin', 'SmurfController@addStaffByAdminValidate');
// Route::post('/grantStaff', 'SmurfController@grantStaffValidate');
// // ================= Nurse ====================
// Route::post('/searchPatientProfileByNurse', 'SmurfController@searchPatientProfileByNurseValidate');
// Route::post('/recordPatientGeneralDetail', 'SmurfController@recordPatientGeneralDetailValidate');
// Route::post('/doctorScheduleByNurse', 'SmurfController@doctorScheduleByNurseValidate');
// // ================= Phar ====================
// Route::post('/recordPrescriptionHistory', 'SmurfController@recordPrescriptionHistoryValidate');
// // ================= Doctor ====================
// Route::post('/searchPatientProfileByDoctor', 'SmurfController@searchPatientProfileByDoctorValidate');
// Route::post('/diagnose', 'SmurfController@diagnoseValidate');
// // ================= Doctor ====================
// Route::post('/addPatient', 'SmurfController@addPatientValidate');

// Route::post('/editProfile', 'SmurfController@editProfileValidate');
// Route::post('/createAppointment', 'SmurfController@createAppointmentValidate');
// Route::post('/doctorList', 'SmurfController@doctorListValidate');
// // ================= Admin ====================
// Route::post('/addDepartment', 'SmurfController@addDepartmentValidate');
// Route::post('/addMedicine', 'SmurfController@addMedicineValidate');
// Route::post('/addStaffByAdmin', 'SmurfController@addStaffByAdminValidate');
// Route::post('/grantStaff', 'SmurfController@grantStaffValidate');
// // ================= Nurse ====================
// Route::post('/searchPatientProfileByNurse', 'SmurfController@searchPatientProfileByNurseValidate');
// Route::post('/recordPatientGeneralDetail', 'SmurfController@recordPatientGeneralDetailValidate');
// Route::post('/doctorScheduleByNurse', 'SmurfController@doctorScheduleByNurseValidate');
// // ================= Phar ====================
// Route::post('/recordPrescriptionHistory', 'SmurfController@recordPrescriptionHistoryValidate');
// // ================= Doctor ====================
// Route::post('/searchPatientProfileByDoctor', 'SmurfController@searchPatientProfileByDoctorValidate');
// Route::post('/diagnose', 'SmurfController@diagnoseValidate');
// // ================= Doctor ====================
// Route::post('/addPatient', 'SmurfController@addPatientValidate');






Route::get('/diagRecordPdf','pdfController@diagRecordPdf');
Route::get('/showDiagnosisHistoryPdf','pdfController@showDiagnosisHistoryPdf');
Route::get('/forgetPasswordEmail', 'emailController@forgetPasswordEmail');
Route::get('/postponedAppointmentEmail', 'emailController@postponedAppointmentEmail');
Route::get('/createStaffEmail', 'emailController@createStaffEmail');
Route::get('/confirmRegistrationEmail', 'emailController@confirmRegistrationEmail');
Route::get('/confirmAppointmentEmail', 'emailController@confirmAppointmentEmail');

