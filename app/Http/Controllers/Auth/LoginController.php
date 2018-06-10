<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\Event;
use App\Member;
use App\User;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/';
    protected $redirectTo = '/events';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function handleProviderCallback()
	{
// 		dd($user);
         	// ユーザー情報取得
            $userData = Socialite::driver('facebook')->user();
            // dd($userData);
            // ユーザー作成
            $user = User::firstOrCreate([
                    'name' => $userData->getName(),
                    'email' => $userData->getEmail()
            ]);
            $user->save();
            
            Auth::login($user);
        dd($user);
            return redirect('/');
	}
	
	
// 	ツイッターログイン
// 	protected $redirectPath = '/home';

//     public function redirectToProvider(){
//         return Socialite::driver('twitter')->redirect();
//     }

//     public function handleProviderCallback(){
//         try {
//             $user = Socialite::driver('twitter')->user();
//         } catch (Exception $e) {
//             return redirect('auth/twitter');
//         }
//         $authUser = $this->findOrCreateUser($user);
//         Auth::login($authUser, true);
//         return redirect()->route('home');
//     }

//     private function findOrCreateUser($twitterUser){
//         $authUser = User::where('twitter_id', $twitterUser->id)->first();
//         if ($authUser){
//             return $authUser;
//         }
//         return User::create([
//             'name' => $twitterUser->name,
//             'nickname' => $twitterUser->nickname,
//             'twitter_id' => $twitterUser->id,
//             'avatar' => $twitterUser->avatar_original
//         ]);
//     }
	
	
	
	
}
