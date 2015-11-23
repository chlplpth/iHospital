<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\department;

class departmentController extends Controller
{
    //store department from admin.addDepartment
    public function addDepartment(Request $request){
    	$department = new department($request->all());
        $department->save();
        return redirect('/addDepartment');
    }
}