<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class departmentController extends Controller
{
    //store department from addmin.addDepartment
    public function store(){
    	$input = Request::all();
    	$input['timestamp'] = Carbon::now();
    	Department::create($input);

    	return redirect('');
    }
