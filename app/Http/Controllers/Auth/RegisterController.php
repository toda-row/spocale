<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Service\RegisterService;
use App\Http\Service\MailService;
use App\Http\Vo\MailVo;
use Socialite;
use App\Event;
use Config;
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
        // ユーザの登録
        RegisterService::execute($data);
        // メール情報のセット
        $mailData = [
          'userName' => $data['name'],
          'toEmail' => $data['email'],
          'password' => $data['password'],
          'sendFrom' => Config::get('const.sendFrom'),
          'subject' => 'スポカレ'.$data['name'].'さん、ご登録ありがとうございます。',
          'bcc' => Config::get('const.bcc'),
          'bodyPath' => Config::get('const.registerBodyPath')
        ];
        // メールVOインスタンスを生成
        $vo = new MailVo();
        // VOにメール情報をセット
        $vo->setData($mailData);
        // メールの送信
        MailService::execute($vo);

        return redirect('/events');
    }
}
