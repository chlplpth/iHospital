<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use App\doctor;
use App\hospitalStaff;

use Input;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class searchController extends Controller
{

    // public function index()
    // {
    	
    // }

    // doctor
    public function searchPatientProfileByDoctor()
    {
        return $this->searchPatient('patientProfileByDoctor');
    }
    public function searchPatientDiagnoseRecord()
    {
        return $this->searchPatient('diagnose');
    }

    // staff
    public function searchImportDoctorSchedule()
    {
    	return $this->searchDoctor('importDoctorSchedule');
    }

    public function searchPatientMakeAppointment()
    {
        return $this->searchPatient('createAppointmentForPatient');
    }

    public function searchPatientManageAppointment()
    {
        return $this->searchPatient('manageAppointmentForPatient');
    }

    public function searchDoctorManageAppointmentByStaff()
    {
        return $this->searchDoctor('doctorScheduleByStaff');
    }

    public function searchHospitalStaffManage()
    {
        return $this->searchHospitalStaff('manageStaffByStaff');
    }

    // nurse
    public function searchRecordPhysicalRecord()
    {
        return $this->searchPatient('recordPatientGeneralDetail');
    }

    // pharmacist
    public function searchPrescribe()
    {
        return $this->searchPatient('recordPrescription');
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

    public function searchPatient($url)
    {
    	$query = e(Input::get('q',''));
    	if(!$query && $query == '') return Response::json(array(), 400);

    	$patient = patient::searchPatient($query)
    						->take(5)
    						->get(array('patient.userId', 'name', 'surname'));
		$patient = $this->appendClass($patient, 'patient');
		$patient = $this->appendUrl($patient, $url);

		return Response::json(array(
			'data' => $patient
		));
    }

    public function searchHospitalStaff($url)
    {
        $query = e(Input::get('q',''));
        if(!$query && $query == '') return Response::json(array(), 400);

        $staff = hospitalStaff::searchHospitalStaff($query)
                            ->take(5)
                            ->get(array('hospitalStaff.userId', 'name', 'surname'));
        $staff = $this->appendClass($staff, 'staff');
        $staff = $this->appendUrl($staff, $url);

        return Response::json(array(
            'data' => $staff
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
