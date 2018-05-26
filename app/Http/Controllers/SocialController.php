<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialController extends Controller
{
    //
        /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function viewLogin()
    {
        return view('auth.login');
    }

    public function getFacebookAuth() {
        return Socialite::driver('facebook')->redirect();
    }

    public function getFacebookAuthCallback() {
        try {
            $fuser = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect("/");
        }
        if ($fuser) {
            dd($fuser);
        } else {
            return 'something went wrong';
        }
    }
    
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
     
    // public function redirectToFacebookProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    // public function handleFacebookProviderCallback()
    // {
    //     try{
    //         $user = Socialite::driver('facebook')->user();

    //         if($user){
    //             dd($user);
    //             // OAuth Two Providers
    //             $token = $user->token;
    //             $refreshToken = $user->refreshToken; // not always provided
    //             $expiresIn = $user->expiresIn;

    //             // All Providers
    //             $user->getId();
    //             $user->getNickname();
    //             $user->getName();
    //             $user->getEmail();
    //             $user->getAvatar();

    //         }
        
            
    //     }catch(Exception $e){
    //         return redirect("/");
    //     }
    //     dd($user);
    //     // $user->token;
    // }
}
