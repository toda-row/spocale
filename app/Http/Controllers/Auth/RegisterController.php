<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\UsersNotification;
use Socialite;
use App\Event;
use App\Member;
use Auth;

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
    protected $redirectTo = '/events/registermail';

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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        

        
    $name = Auth::user()->name;
    $to = [
            // [ 'name' => 'Laravel-01',
            //   'email' => 'yoshihiro.t.88@gmail.com' ],
            [
                'name' => 'Laravel-02',
                'email' => Auth::user()->email
            ]
        ];
        
    // $cc = 'cc@mail.com';
    $bcc =  [
        // 'name' => 'Spocale-owner',
        'email' =>'spocale@gmail.com'
        ];
    //送れてない
        
    Mail::to($to)
            // ->cc($cc)
            ->bcc($bcc)
            ->send(new UsersNotification($name));
    }
}
