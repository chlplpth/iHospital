<?php

namespace App\Http\Controllers;

use Illumination\Http\Request;

use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    
    public function createUser($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
    public function createPatient($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }

}