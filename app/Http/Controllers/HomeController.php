<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events');
    }
    
    public function policy() {
            
            return view('policy');
            
            
            
        }
        
    public function agreement() {
        
        return view('agreement');
        
            
            
        }
    
}
