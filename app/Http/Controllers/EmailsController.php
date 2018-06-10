<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EventsNotification;
// use Event;
// use User;
use Auth;



class EmailsController extends Controller
{
    //
    public function EventsNotification()
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
    $bcc =  ['email' =>'idol.navigator@gmail.com'];
    //送れてない
        
    Mail::to($to)
            // ->cc($cc)
            ->bcc($bcc)
            ->send(new EventsNotification($name, $text));
            
    return redirect('/events');
  }
  


}
