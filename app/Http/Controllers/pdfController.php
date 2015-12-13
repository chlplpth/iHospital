<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
use Auth;
use Carbon\Carbon;

use App\appointment;
use App\doctor;
use App\schedule;

class pdfController extends Controller
{
	public function diagRecordPdf(Request $request){
		$appId = $request['appointmentId'];
		$app = appointment::where('appointmentId', $appId)->first();
		$general = $app->physicalRecord;
        $diag = $app->diagnosisRecord;
        $prescription = $app->prescription;

		$data = [
		'date'         => $app->diagDate(),
		'HN'    => $app->patient->hospitalNo,
		'patName'      => $app->patient->name(),
		'patLast'         => $app->patient->surname(),
		'sex'      => $app->patient->sex,
		'bloodType'         => $app->patient->bloodGroup,
		'age'         => $app->age(),
		'doctorName'    => $app->doctor()->fullname(),
		'department'      => $app->department()->departmentName,
		'diagDate'         => $app->diagDate(),
		'diagTime'      => $app->diagTime(),
		'symptom'      => $app->symptom,
		'diag'         => $diag->diagnosisDetail,
		'medicine'  => $prescription->medicines,
		'weight'	=> $general->weight,
		'height'	=> $general->height,
		'sysBlood'	=> $general->sysBlood,
		'diBlood'	=> $general->diBlood,
		'heartRate'	=> $general->heartRate
		];
		$pdf=PDF::loadView('patient/diagRecordPdf',$data)->setOption('page-size', 'A4');
		return $pdf->stream();
	}
	public function showDiagnosisHistoryPdf($year, $month)
	{
		$doctor = doctor::where('userId', Auth::user()->userId)->first();
		$stats = $doctor->getDiagStats($year, $month);

		$data = [
		'month' => schedule::getMonthName($month),
		'date' => schedule::formatDiagDate(Carbon::now()->format('Y-m-d')),
		'doctorName' => $doctor->fullname(),
		'department' => $doctor->department()->departmentName,
		'diag' => $stats,
		// 'diag' => ['1'=>['diagDate'=>'1/1/2558','morning'=>'3','afternoon'=>'12'],
		// '2'=>['diagDate'=>'2/1/2558','morning'=>'1','afternoon'=>'7'],
		// '3'=>['diagDate'=>'3/1/2558','morning'=>'5','afternoon'=>'2'],
		// '4'=>['diagDate'=>'4/1/2558','morning'=>'1','afternoon'=>'7'],
		// '5'=>['diagDate'=>'5/1/2558','morning'=>'1','afternoon'=>'7'],
		// '6'=>['diagDate'=>'6/1/2558','morning'=>'1','afternoon'=>'7'],
		// '7'=>['diagDate'=>'7/1/2558','morning'=>'1','afternoon'=>'7'],
		// '8'=>['diagDate'=>'8/1/2558','morning'=>'1','afternoon'=>'7'],
		// '9'=>['diagDate'=>'9/1/2558','morning'=>'1','afternoon'=>'7'],
		// '10'=>['diagDate'=>'10/1/2558','morning'=>'1','afternoon'=>'7'],
		// '11'=>['diagDate'=>'11/1/2558','morning'=>'1','afternoon'=>'7'],
		// '12'=>['diagDate'=>'12/1/2558','morning'=>'1','afternoon'=>'7'],
		// '13'=>['diagDate'=>'13/1/2558','morning'=>'1','afternoon'=>'7'],
		// '14'=>['diagDate'=>'14/1/2558','morning'=>'1','afternoon'=>'7'],
		// '15'=>['diagDate'=>'15/1/2558','morning'=>'1','afternoon'=>'7'],
		// '16'=>['diagDate'=>'16/1/2558','morning'=>'1','afternoon'=>'7'],
		// '17'=>['diagDate'=>'17/1/2558','morning'=>'1','afternoon'=>'7'],
		// '18'=>['diagDate'=>'18/1/2558','morning'=>'5','afternoon'=>'2'],
		// '19'=>['diagDate'=>'19/1/2558','morning'=>'1','afternoon'=>'7'],
		// '20'=>['diagDate'=>'20/1/2558','morning'=>'1','afternoon'=>'7'],
		// '21'=>['diagDate'=>'21/1/2558','morning'=>'1','afternoon'=>'7'],
		// '22'=>['diagDate'=>'22/1/2558','morning'=>'1','afternoon'=>'7'],
		// '23'=>['diagDate'=>'23/1/2558','morning'=>'1','afternoon'=>'7'],
		// '24'=>['diagDate'=>'24/1/2558','morning'=>'1','afternoon'=>'7'],
		// '25'=>['diagDate'=>'25/1/2558','morning'=>'1','afternoon'=>'7'],
		// '26'=>['diagDate'=>'26/1/2558','morning'=>'1','afternoon'=>'7'],
		// '27'=>['diagDate'=>'27/1/2558','morning'=>'1','afternoon'=>'7'],
		// '28'=>['diagDate'=>'28/1/2558','morning'=>'1','afternoon'=>'7'],
		// '29'=>['diagDate'=>'29/1/2558','morning'=>'1','afternoon'=>'7'],
		// '30'=>['diagDate'=>'30/1/2558','morning'=>'1','afternoon'=>'7'],
		// '31'=>['diagDate'=>'31/1/2558','morning'=>'1','afternoon'=>'7'],
		// ] 
		];
		
		$pdf=PDF::loadView('doctor/showDiagnosisHistoryPdf',$data)->setOption('page-size', 'A4');
		return $pdf->stream();
		
	}

}
