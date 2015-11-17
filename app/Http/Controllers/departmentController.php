<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class departmentController extends Controller
{
    //store department from addmin.addDepartment
    public function addDepartment(Request $Request){
    	$department = new department($request->all());
        $department->save();

        return redirect('department.all',compact($department));
    }
