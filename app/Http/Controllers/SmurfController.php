<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\EditProfileRequest;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Requests\DoctorListRequest;
use App\Http\Controllers\Controller;

class SmurfController extends Controller
{
    public function editProfileValidate(EditProfileRequest $request){
    	
    }
    public function createAppointmentValidate(CreateAppointmentRequest $request){
    	echo "test";
    }
  	public function doctorListValidate(DoctorListRequest $request){
    	
    }
}
