<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\DoctorListRequest;
use App\Http\Requests\AddDepartmentRequest;
use App\Http\Requests\AddMedicineRequest;
use App\Http\Requests\AddStaffByAdminRequest;
use App\Http\Requests\GrantStaffRequest;
use App\Http\Requests\SearchPatientProfileByNurseRequest;
use App\Http\Requests\RecordPatientGeneralDetailRequest;
use App\Http\Requests\DoctorScheduleByNurseRequest;
use App\Http\Requests\RecordPrescriptionHistoryRequest;
use App\Http\Requests\SearchPatientProfileByDoctorRequest;
use App\Http\Requests\DiagnoseRequest;
use App\Http\Requests\AddPatientByStaffRequest;
use App\Http\Requests\AddStaffByStaffRequest;
use App\Http\Requests\CreateAppointmentForPatientRequest;
use App\Http\Requests\ManageAppointmentForPatientRequest;
use App\Http\Requests\ImportDoctorScheduleRequest;
use App\Http\Requests\SearchDoctorScheduleByStaffRequest;
use App\Http\Requests\ManageStaffByStaffRequest;

class SmurfController extends Controller
{
    // ================= Patient ==================
    public function editProfileValidate(EditProfileRequest $request){
    	
    }
    public function createAppointmentValidate(CreateAppointmentRequest $request){

    }
  	public function doctorListValidate(DoctorListRequest $request){
    	
    }
    // ================= Admin ====================
    public function addDepartmentValidate(AddDepartmentRequest $request){
    
    }
    public function addMedicineValidate(AddMedicineRequest $request){
    
    }
     public function addStaffByAdminValidate(AddStaffByAdminRequest $request){
    
    }
    public function grantStaffValidate(GrantStaffRequest $request){
    
    }
    // ================= Nurse ====================
    public function searchPatientProfileByNurseValidate(SearchPatientProfileByNurseRequest $request){
    
    }
    public function recordPatientGeneralDetailValidate(RecordPatientGeneralDetailRequest $request){
    
    }
    public function doctorScheduleByNurseValidate(DoctorScheduleByNurseRequest $request){
    
    }
    // ================= Pharmacist ====================
    public function recordPrescriptionHistoryValidate(RecordPrescriptionHistoryRequest $request){
    
    }
    // ================= Doctor ====================
    public function searchPatientProfileByDoctorValidate(SearchPatientProfileByDoctorRequest $request){
    
    }
    public function diagnoseValidate(DiagnoseRequest $request){
    
    }
    
    public function addPatientByStaffValidate(AddPatientByStaffRequest $request){
        
    }
    public function addStaffByStaffValidate(AddStaffByStaffRequest $request){
        
    }
    public function createAppointmentForPatientValidate(CreateAppointmentForPatientRequest $request){
        
    }
    public function manageAppointmentForPatientValidate(ManageAppointmentForPatientRequest $request){
        
    }
    public function importDoctorScheduleValidate(ImportDoctorScheduleRequest $request){
        
    }
    public function searchDoctorScheduleByStaffValidate(SearchDoctorScheduleByStaffRequest $request){
        
    }
    public function manageStaffByStaffValidate(ManageStaffByStaffRequest $request){
        
    }
}

