<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EventsNotification;
use App\Mail\UsersNotification;
use Event;
// use User;
use Auth;



class EmailsController extends Controller
{
    
    public function EventsNotification(Request $request)
          {
            $name = Auth::user()->name;
            
            $eventnumber = $request->event_id;
            $text = $_SERVER["HTTP_HOST"] ."/detail/". $eventnumber;
        
            // $text = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
            
            $events = Event::where('id',$request->event_id)
                    // ->get();
                    ->first();
                    // ->join('users','users.id','=','events.user_id');
            
            $events->event_name;
                   
            $to = [
                    // [
                    //     'name' => 'Laravel-01',
                    //     'email' => 'yoshihiro.t.88@gmail.com'
                    // ],
                    [
                        'name' => 'Laravel-02',
                        'email' => Auth::user()->email
                    ]
                ];
                
            // $cc = 'cc@mail.com';
            $bcc =  ['email' =>'spocale@gmail.com'];
            //送れてない
                
            Mail::to($to)
                    // ->cc($cc)
                    ->bcc($bcc)
                    ->send(new EventsNotification($name, $text,$events));
                    
            return redirect('/events');
          }
  
  
      public function UsersregisterNotification()
          {
            $name = Auth::user()->name;
        
            $text = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
            
                        
            $to = [
                    // [
                    //     'name' => 'Laravel-01',
                    //     'email' => 'yoshihiro.t.88@gmail.com'
                    // ],
                    [
                        'name' => 'Laravel-02',
                        'email' => Auth::user()->email
                    ]
                ];
                
            // $cc = 'cc@mail.com';
            $bcc =  ['email' =>'spocale@gmail.com'];
            //送れてない
                
            Mail::to($to)
                    // ->cc($cc)
                    ->bcc($bcc)
                    ->send(new UsersNotification($name, $text));
                    
            return redirect('/events');
          }


}
