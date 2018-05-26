<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EventsNotification;


class EmailsController extends Controller
{
    //
    public function EventsNotification()
  {
    $name = 'ララベル太郎';
    $text = 'これからもよろしくお願いいたします。';
    
    //バリデーション
            $validator = Validator::make($request->all(), [
                'event_name' => 'required |min:3 | max:100',
                'event_price' => 'required | min:1 | max:10',
                'email' => 'required',
                'event_date' => 'required',
                // 'file' => 'required',
                'description' => 'required |min:3 | max:2000',
                ]);
                
            $user_id = Auth::user()->id; // 追加 のコード
            $event_name = $request->event_name;
            $event_price = $request->event_price;
            $event_type = $request->event_type;
            $event_area = $request->event_area;
            $event_adress = $request->event_adress;
            $email = $request->email;
            $event_date = $request->event_date;
            $description = $request->description;         
                
    $to = [
            // [
            //     'name' => 'Laravel-01',
            //     'email' => 'yoshihiro.t.88@gmail.com'
            // ],
            [
                'name' => 'Laravel-02',
                // 'email' => 'yoshihiro.t.88@gmail.com'
                'email' => Auth::user()->email
            ]
        ];
        
    // $cc = 'cc@mail.com';
    $bcc = 'idol.navigator@gmail.com';
        
    Mail::to($to)
            // ->cc($cc)
            ->bcc($bcc)
            ->send(new EventsNotification($name, $text));
  }

}
