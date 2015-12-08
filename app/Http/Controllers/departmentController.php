<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\department;

use App\User;
use App\patient;

class departmentController extends Controller
{
    //store department from admin.addDepartment
    public function addDepartment(Request $request){
    	$input = $request->all();
    	department::create($input);
        return redirect('/addDepartment');

    }

    public function testfunc()
    {
    	echo '<!DOCTYPE html> <meta charset="utf-8">';
    	$uu = user::where('userId', 6)->first();
    	return view('testSearch')->with('user', $uu);
    }
}