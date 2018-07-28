<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Event;
use Auth;
use Mail;
use App\Mail\EventsNotification;


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
            
// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
    $name = Auth::user()->name;

    $eventnumber = $request->event_id;
    
    $text = $_SERVER["HTTP_HOST"] ."/detail/". $eventnumber;
    

    $events = Event::where('id',$request->event_id)
                    // ->get();
                    ->first();
                    // ->join('users','users.id','=','events.user_id');
    
    $events->event_name;
    // // dd($events);

                
    // $to = [
    //         // [
    //         //     'name' => 'Laravel-01',
    //         //     'email' => 'yoshihiro.t.88@gmail.com'
    //         // ],
    //         [
    //             'name' => 'Laravel-02',
    //             'email' => Auth::user()->email
    //         ]
    //     ];
        
    // // $cc = 'cc@mail.com';
    // $bcc =  [
    //     // 'name' => 'Spocale-owner',
    //     'email' =>'spocale@gmail.com'
    //     ];
    // //送れてない
        
    // Mail::to($to)
    //         // ->cc($cc)
    //         ->bcc($bcc)
    //         ->send(new EventsNotification($name, $text,$events));

// ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝            
            
            return redirect('/events/eventaddmail');
        }
        
        public function destroy(Member $attendsevent) {
            // $event->delete();
            // dd($request);
            
            $attendsevent = Member::where('attenduser_id',Auth::user()->id)->find($attendsevent->id);
            // $events->life_flg = $request->life_flg;
            $attendsevent->life_flg = 0;
            $attendsevent->save();
            
            
            return redirect('/events');
        }
}
