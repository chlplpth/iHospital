<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Hash;
use App\User;
use App\Patient;
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

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function authenticate(Request $request)
    {
        if(Auth::attempt(['username' => $request['username'], 'password' => $request['password']]))
        {
            echo "logged in successfully!";
        }
        else
        {
            echo "Wrong username or password";
        }
    }

    public function register(Request $request)
    {
        // $input = $request->all();
        // $input['password'] = Hash::make($request['password']);
        // $user = User::create($input);

        // $patient = $input;
        // $addressSet = array($input['addressNo'], $input['moo'], $input['street'], $input['subdistrict'], $input['district'], $input['province'], $input['zipcode']);
        // $patient['address'] = join(',,', $addressSet);
        // $patient['userId'] = $user->id;
        // $patient = Patient::create($patient);
        
        echo "hey";
        $pp = Patient::where('sex', 'M')->get();
        foreach($pp as $p)
        {
            echo $p;
        }
    }

}
