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

Route::get('cancleAppointment', function() {
    return view('patient/cancleAppointment');
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

Route::get('addStaffByStaff', function() {
    return view('staff/addStaffByStaff');
});

Route::get('manageStaffByStaff', function() {
    return view('staff/manageStaffByStaff');
});

Route::get('searchPatientProfileByStaff', function() {
    return view('staff/searchPatientProfileByStaff');
});

Route::get('searchDoctorScheduleByStaff', function() {
    return view('staff/searchDoctorScheduleByStaff');
});

Route::get('createAppointment', function() {
    return view('patient/createAppointment');
});

Route::get('editProfile', function() {
    return view('patient/editProfile');
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

Route::get('/addMedicine', function () {
    return view('admin/addMedicine');
});

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

Route::get('/pdf', function(){
    $data = [
    'month' => 'มกราคม',
    'date' => '21/11/58',
    'doctorName' => 'เทรุ',
    'department' => 'ทำคลอด',
    'diag' => ['1'=>['diagDate'=>'1/1/2558','morning'=>'3','afternoon'=>'12'],
    '2'=>['diagDate'=>'2/1/2558','morning'=>'1','afternoon'=>'7'],
    '3'=>['diagDate'=>'3/1/2558','morning'=>'5','afternoon'=>'2'],
    '4'=>['diagDate'=>'4/1/2558','morning'=>'1','afternoon'=>'7'],
    '5'=>['diagDate'=>'5/1/2558','morning'=>'1','afternoon'=>'7'],
    '6'=>['diagDate'=>'6/1/2558','morning'=>'1','afternoon'=>'7'],
    '7'=>['diagDate'=>'7/1/2558','morning'=>'1','afternoon'=>'7'],
    '8'=>['diagDate'=>'8/1/2558','morning'=>'1','afternoon'=>'7'],
    '9'=>['diagDate'=>'9/1/2558','morning'=>'1','afternoon'=>'7'],
    '10'=>['diagDate'=>'10/1/2558','morning'=>'1','afternoon'=>'7'],
    '11'=>['diagDate'=>'11/1/2558','morning'=>'1','afternoon'=>'7'],
    '12'=>['diagDate'=>'12/1/2558','morning'=>'1','afternoon'=>'7'],
    '13'=>['diagDate'=>'13/1/2558','morning'=>'1','afternoon'=>'7'],
    '14'=>['diagDate'=>'14/1/2558','morning'=>'1','afternoon'=>'7'],
    '15'=>['diagDate'=>'15/1/2558','morning'=>'1','afternoon'=>'7'],
    '16'=>['diagDate'=>'16/1/2558','morning'=>'1','afternoon'=>'7'],
    '17'=>['diagDate'=>'17/1/2558','morning'=>'1','afternoon'=>'7'],
    '18'=>['diagDate'=>'18/1/2558','morning'=>'5','afternoon'=>'2'],
    '19'=>['diagDate'=>'19/1/2558','morning'=>'1','afternoon'=>'7'],
    '20'=>['diagDate'=>'20/1/2558','morning'=>'1','afternoon'=>'7'],
    '21'=>['diagDate'=>'21/1/2558','morning'=>'1','afternoon'=>'7'],
    '22'=>['diagDate'=>'22/1/2558','morning'=>'1','afternoon'=>'7'],
    '23'=>['diagDate'=>'23/1/2558','morning'=>'1','afternoon'=>'7'],
    '24'=>['diagDate'=>'24/1/2558','morning'=>'1','afternoon'=>'7'],
    '25'=>['diagDate'=>'25/1/2558','morning'=>'1','afternoon'=>'7'],
    '26'=>['diagDate'=>'26/1/2558','morning'=>'1','afternoon'=>'7'],
    '27'=>['diagDate'=>'27/1/2558','morning'=>'1','afternoon'=>'7'],
    '28'=>['diagDate'=>'28/1/2558','morning'=>'1','afternoon'=>'7'],
    '29'=>['diagDate'=>'29/1/2558','morning'=>'1','afternoon'=>'7'],
    '30'=>['diagDate'=>'30/1/2558','morning'=>'1','afternoon'=>'7'],
    '31'=>['diagDate'=>'31/1/2558','morning'=>'1','afternoon'=>'7'],
    ] 
    ];
    $pdf=PDF::loadView('doctor/showDiagnosisHistoryPdf',$data)->setOption('page-size', 'A4');
    return $pdf->stream();
});

Route::get('/diagPdf', function(){

    $data = [
    'date'         => '21/11/58',
    'HN'    => 'HN-00000000',
    'patName'      => 'ผู้ป่วย',
    'patLast'         => 'น๊ะจ๊ะ',
    'sex'      => 'ชาย',
    'bloodType'         => 'O',
    'age'         => '21',
    'doctorName'    => 'เทรุ',
    'department'      => 'ทำคลอด',
    'diagDate'         => '21/11/58',
    'diagTime'      =>'9.00-12.00 น.',
    'symptom'      => 'ท้อง',
    'diag'         => 'ท้องๆๆๆๆๆ',
    'medicine'  => ['1'=>['drugName'=>'para','quantity'=>'5'],
    '2'=>['drugName'=>'para2','quantity'=>'10']
    ]
    ];
    $pdf=PDF::loadView('patient/diagRecordPdf',$data)->setOption('page-size', 'A4');
    return $pdf->stream();
});
Route::get('/test', function () {
    $data = [
    'month' => 'มกราคม',
    'date' => '21/11/58',
    'doctorName' => 'เทรุ',
    'department' => 'ทำคลอด',
    'diag' => ['1'=>['diagDate'=>'1/1/2558','morning'=>'3','afternoon'=>'12'],
    '2'=>['diagDate'=>'2/1/2558','morning'=>'1','afternoon'=>'7'],
    '3'=>['diagDate'=>'3/1/2558','morning'=>'5','afternoon'=>'2'],
    '4'=>['diagDate'=>'4/1/2558','morning'=>'1','afternoon'=>'7'],
    '5'=>['diagDate'=>'5/1/2558','morning'=>'1','afternoon'=>'7'],
    '6'=>['diagDate'=>'6/1/2558','morning'=>'1','afternoon'=>'7'],
    '7'=>['diagDate'=>'7/1/2558','morning'=>'1','afternoon'=>'7'],
    '8'=>['diagDate'=>'8/1/2558','morning'=>'1','afternoon'=>'7'],
    '9'=>['diagDate'=>'9/1/2558','morning'=>'1','afternoon'=>'7'],
    '10'=>['diagDate'=>'10/1/2558','morning'=>'1','afternoon'=>'7'],
    '11'=>['diagDate'=>'11/1/2558','morning'=>'1','afternoon'=>'7'],
    '12'=>['diagDate'=>'12/1/2558','morning'=>'1','afternoon'=>'7'],
    '13'=>['diagDate'=>'13/1/2558','morning'=>'1','afternoon'=>'7'],
    '14'=>['diagDate'=>'14/1/2558','morning'=>'1','afternoon'=>'7'],
    '15'=>['diagDate'=>'15/1/2558','morning'=>'1','afternoon'=>'7'],
    '16'=>['diagDate'=>'16/1/2558','morning'=>'1','afternoon'=>'7'],
    '17'=>['diagDate'=>'17/1/2558','morning'=>'1','afternoon'=>'7'],
    '18'=>['diagDate'=>'18/1/2558','morning'=>'5','afternoon'=>'2'],
    '19'=>['diagDate'=>'19/1/2558','morning'=>'1','afternoon'=>'7'],
    '20'=>['diagDate'=>'20/1/2558','morning'=>'1','afternoon'=>'7'],
    '21'=>['diagDate'=>'21/1/2558','morning'=>'1','afternoon'=>'7'],
    '22'=>['diagDate'=>'22/1/2558','morning'=>'1','afternoon'=>'7'],
    '23'=>['diagDate'=>'23/1/2558','morning'=>'1','afternoon'=>'7'],
    '24'=>['diagDate'=>'24/1/2558','morning'=>'1','afternoon'=>'7'],
    '25'=>['diagDate'=>'25/1/2558','morning'=>'1','afternoon'=>'7'],
    '26'=>['diagDate'=>'26/1/2558','morning'=>'1','afternoon'=>'7'],
    '27'=>['diagDate'=>'27/1/2558','morning'=>'1','afternoon'=>'7'],
    '28'=>['diagDate'=>'28/1/2558','morning'=>'1','afternoon'=>'7'],
    '29'=>['diagDate'=>'29/1/2558','morning'=>'1','afternoon'=>'7'],
    '30'=>['diagDate'=>'30/1/2558','morning'=>'1','afternoon'=>'7'],
    '31'=>['diagDate'=>'31/1/2558','morning'=>'1','afternoon'=>'7'],
    ] 
    ];
    return view('doctor/showDiagnosisHistoryPdf',$data);
});
// ================= FOR SMURF CONTROLLER (VALIDATION) ============================
// Route::post('/editProfile', 'SmurfController@editProfileValidate');
// Route::post('/createAppointment', 'SmurfController@createAppointmentValidate');
// Route::post('/doctorList', 'SmurfController@doctorListValidate');
// Route::post('/addDepartment', 'SmurfController@addDepartmentValidate');
// Route::post('/addMedicine', 'SmurfController@addMedicineValidate');
// Route::post('/addStaffByAdmin', 'SmurfController@addStaffByAdminValidate');
// Route::post('/grantStaff', 'SmurfController@grantStaffValidate');



Route::get('/forgetPasswordEmail', 'emailController@forgetPasswordEmail');
Route::get('/postponedAppointmentEmail', 'emailController@postponedAppointmentEmail');
Route::get('/createStaffEmail', 'emailController@createStaffEmail');
Route::get('/confirmRegistrationEmail', 'emailController@confirmRegistrationEmail');
Route::get('/confirmAppointmentEmail', 'emailController@confirmAppointmentEmail');

//------------------------------------ postman --------------------------------
// Route::post('/importSchedule', 'scheduleController@importSchedule');
// Route::post('/addDepartment', 'departmentController@addDepartment');
// Route::post('/register', 'userController@registerNewPatient');
// Route::post('/editPatientProfile', 'userController@editPatientProfile');
// Route::post('/addHospitalStaff', 'userController@addHospitalStaff');
// Route::post('/registerOld', 'userController@registerOldPatient');

// Route::post('/createAppointment', 'appointmentController@createAppointmentStore');

// //Route::post('/createAppointment', 'appointmentController@createAppointmentStore');

// Route::post('/editAppointment', 'appointmentController@editAppointmentStore');

// Route::post('/recordDiag', 'diagnosisRecordController@recordDiagnosis');

// Route::post('/viewDiag', 'diagnosisRecordController@viewDiagnosisHistoryDoctor');


// Route::post('/cancelApp', 'appointmentController@cancelAppointment');

// Route::post('/viewAppointment', 'appointmentController@viewDoctorAppointment');