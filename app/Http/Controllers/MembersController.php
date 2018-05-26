<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Auth;


class MembersController extends Controller
{   
    
                // ログイン処理
    public function __construct(){
        
        // $this->middleware('auth')->except(['index']);
        $this->middleware('auth')->except(['index', 'detail']);
    }
    
    public function attend(Request $request){
            
           // Eloquent モデル 
        
            $members = new Member;
            $members->attenduser_id = Auth::user()->id; // 追加 のコード
            $members->event_id = $request->event_id;

            $members->save(); 
            // dd($members);
            return redirect('/events');
        }
}
