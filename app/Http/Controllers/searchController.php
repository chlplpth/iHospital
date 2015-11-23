<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;

use Input;
use Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class searchController extends Controller
{

    public function index()
    {
    	
    }

    public function searchPatient()
    {
    	$query = e(Input::get('q',''));
    	if(!$query && $query == '') return Response::json(array(), 400);

    	$patient = patient::searchPatient($query)
    						->take(5)
    						->get(array('patient.userId', 'name', 'surname'));
		$patient = $this->appendClass($patient, 'patient');
		$patient = $this->appendUrl($patient);

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

	public function appendUrl($data)
	{
		foreach ($data as $key => & $item) {
			$item->url = url('/testSearch');
		}
		return $data;
	}
	// ========================================================
}
