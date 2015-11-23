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


class SmurfController extends Controller
{
    public function editProfileValidate(EditProfileRequest $request){
    	
    }
    public function createAppointmentValidate(CreateAppointmentRequest $request){
    	echo "test";
    }
  	public function doctorListValidate(DoctorListRequest $request){
    	
    }
    public function addDepartmentValidate(AddDepartmentRequest $request){
    
    }
    public function addMedicineValidate(AddMedicineRequest $request){
    
    }
     public function addStaffByAdminValidate(AddStaffByAdminRequest $request){
    
    }
    public function grantStaffValidate(GrantStaffRequest $request){
    
    }
}
