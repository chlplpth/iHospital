<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use PDF;
class pdfController extends Controller
{
	public function diagRecordPdf(){
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
	}
	public function showDiagnosisHistoryPdf()
	{
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
		
	}

}
