<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Patient;
use App\Http\Requests\LoginRequest;
use Validator;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    // ------------------------------- main page -------------------------------

    public function getMainPage()
    {
        if(Auth::check()){
            $utype = Auth::user()->userType;
            if($utype == 'patient')
            {
                return view('patient.mainPatient');
            }
            else if($utype == 'doctor')
            {
                return view('doctor.mainDoctor');
            }
            else if($utype == 'staff')
            {
                return view('staff.mainStaff');
            }
            else if($utype == 'pharmacist')
            {
                return view('pharmacist.mainPharmacist');
            }
            else if($utype == 'nurse')
            {
                return view('nurse.mainNurse');
            }
            else if($utype == 'admin')
            {
                return view('admin.mainAdmin');
            }
        }
        else
        {
            return view('general.login');
        }
    }

    // ------------------------------- login & logout -------------------------------

    public function authenticate(LoginRequest $request)
    {
        $user = User::where('username', $request['username'])->first();
        if(Auth::attempt(['userId' => $user->userId, 'password' => $request['password']])) {
            // logged in ... :)
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // ------------------------------- forget & change password -------------------------------

    public function forgetPassword(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        if($user != null)
        {
            $verifyCode = $user->genVerifyCode();
            echo '<a href="' . url('/') . '/changePassword/' . $verifyCode . '"> change password </a>';
        }
    }

    public function changePasswordGet($verifyCode)
    {
        $user = User::where('verifyCode', $verifyCode)->first();
        if($user != null)
        {
            return view('general.changePassword')->with('verifyCode', $verifyCode);
        }
    }

    public function changePasswordPost(Request $request)
    {
        User::setNewPassword($request['verifyCode'], Hash::make($request['newPassword']));
        return redirect('/');
    }


    public function genPassword($text)
    {
        echo $text . "   =   " . Hash::make($text);
    }
}
