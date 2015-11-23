<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class emailController extends Controller
{
	public function confirmRegistrationEmail()
	{
		$data = [
		'name'=>'KamKam',
		'surname'=>'DekDee',
		'username'=>'KamDekDee',
		'link'=>'www.google.com',
		'email'=>'tonkung49031@gmail.com'
		];
		

		Mail::send('emails.confirmRegistrationEmail', $data, function ($message) use ($data) {
			$message->from('ihospital.se@gmail.com', 'iHospital');
			$message->to($data['email']);
			$message->subject('[iHosptal] Confirm your registration!');
		});
		return "success";
	}
	public function confirmAppointmentEmail()
	{
		$data = [
		'name'=>'KamKam',
		'surname'=>'DekDee',
		'HN'=>'HN-00000000',
		'date'=>'1/1/58',
		'time'=>'9.00 น.',
		'doctor'=>'Dr.KamDekDee',
		'department'=>'computer',
		'place'=>'ตึก 4 ชั้น 17',
		'tel'=>'(+66) 0-2218-6956-7',
		'remark'=>'-',
		'link'=>'www.google.com',
		'email'=>'tonkung49031@gmail.com'
		];

		Mail::send('emails.confirmAppointmentEmail', $data, function ($message) use ($data) {
			$message->from('ihospital.se@gmail.com', 'iHospital');
			$message->to($data['email']);
			$message->subject('[iHosptal] You \'ve made an appointment!');
		});
		return "success";
	}
	public function createStaffEmail()
	{
		$data = [
		'name'=>'KamKam',
		'surname'=>'DekDee',
		'username'=>'KamDekDee',
		'link'=>'www.google.com',
		'email'=>'tonkung49031@gmail.com'
		];
		

		Mail::send('emails.createStaffEmail', $data, function ($message) use ($data) {
			$message->from('ihospital.se@gmail.com', 'iHospital');
			$message->to($data['email']);
			$message->subject('[iHosptal] Welcome to iHospital!');
		});
		return "success";
	}
	public function postponedAppointmentEmail()
	{
		$data = [
		'name'=>'KamKam',
		'surname'=>'DekDee',
		'date'=>'1/1/58',
		'time'=>'9.00 น.',
		'newDate'=>'1/1/58',
		'newTime'=>'13.00 น.',
		'doctor'=>'Dr.KamDekDee',
		'department'=>'computer',
		'place'=>'ตึก 4 ชั้น 17',
		'tel'=>'(+66) 0-2218-6956-7',
		'link'=>'www.google.com',
		'email'=>'tonkung49031@gmail.com'
		];

		Mail::send('emails.postponedAppointmentEmail', $data, function ($message) use ($data) {
			$message->from('ihospital.se@gmail.com', 'iHospital');
			$message->to($data['email']);
			$message->subject('[iHosptal] An appointment has been postponed!');
		});
		return "success";
	}
	public function forgetPasswordEmail()
	{
		$data = [
		'name'=>'KamKam',
		'surname'=>'DekDee',
		'username'=>'KamDekDee',
		'link'=>'www.google.com',
		'email'=>'tonkung49031@gmail.com'
		];
		

		Mail::send('emails.forgetPasswordEmail', $data, function ($message) use ($data) {
			$message->from('ihospital.se@gmail.com', 'iHospital');
			$message->to($data['email']);
			$message->subject('[iHosptal] Reset your password!');
		});
		return "success";
	}
}
