<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\medicine;

class medicineController extends Controller
{
    public function addMedicine(Request $request)
    {
    	$input = $request->all();
    	medicine::create($input);
    	return redirect('/');
    }
}
