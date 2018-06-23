<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Event;
use App\Member;
use App\User;
use Validator;
use Auth;



class UsersController extends Controller
{
    
    //
    public function index()
    {
        //
    }
 
    public function create()
    {
        //
    }
    public function store()
    {
        //
    }
    public function show($id)
    {
        //
    }
 
    public function edit(User $users)
    {
        return view('auth/profile', [
                'user' => $users
            ]); 
    }
 
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
                ]);
                
        if ($validator->fails()) {
                return redirect('/')
                ->withInput()
                ->withErrors($validator);
                }
   
        
        //
        $users = User::where('id',Auth::user()->id)->first();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->save();

        
        return redirect('/events');
        
    }
 
    public function destroy($id)
    {
        //
    }
    
}
