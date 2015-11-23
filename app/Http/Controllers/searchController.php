<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\doctor;

use Input;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class searchController extends Controller
{

    // public function index()
    // {
    	
    // }

    public function searchImportDoctorSchedule()
    {
    	return $this->searchDoctor('importDoctorSchedule');
    }

    public function searchDoctor($url)
    {
    	$query = e(Input::get('q',''));
    	if(!$query && $query == '') return Response::json(array(), 400);

    	$doctor = doctor::searchDoctorByName($query)
    						->take(5)
    						->get(array('doctor.userId', 'name', 'surname'));
		$doctor = $this->appendClass($doctor, 'doctor');
		$doctor = $this->appendUrl($doctor, $url);

		return Response::json(array(
			'data' => $doctor
		));
    }

    public function searchPatient()
    {
    	$query = e(Input::get('q',''));
    	if(!$query && $query == '') return Response::json(array(), 400);

    	$patient = patient::searchPatient($query)
    						->take(5)
    						->get(array('patient.userId', 'hospitalNo', 'name', 'surname'));
		$patient = $this->appendClass($patient, 'patient');
		$patient = $this->appendUrl($patient, '/');

		return Response::json(array(
			'data' => $patient
		));
    }

    // ========================================================
    public function appendClass($data, $type)
	{
		foreach ($data as $key => & $item) {
			$item->class = $type;
		}
		return $data;		
	}

	public function appendUrl($data, $url)
	{
		foreach ($data as $key => & $item) {
			$item->url = url($url . '/' . $item->userId);
		}
		return $data;
	}
	// ========================================================
}
