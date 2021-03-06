<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\GamaPointLog;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|string|unique:users',
            //'mobile' => 'required|string|min:10|max:10|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $uniqid = uniqid();

        $user = new User;
        $user->uniqid = $uniqid;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->mobile = $data['country_code'].$data['mobile'];
        //$user->address = $data['address'];
        $user->password = bcrypt($data['password']);
        //$user->gama_point = 100;
        $user->save();

        #?????????????????????
        // $pointLog = new GamaPointLog;
        // $pointLog->userid_share = 'no';
        // $pointLog->userid_used = $uniqid;
        // $pointLog->point = 100;
        // $pointLog->note = $uniqid.'?????????????????????';
        // $pointLog->status = 'ON';
        // $pointLog->save();

        return $user;
    }
}
