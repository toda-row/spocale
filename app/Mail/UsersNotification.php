<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Event;
use User;
use Auth;
use Mail;

class EventsNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    public $events;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $text, $events)
    {
        //
        $this->title = sprintf('スポカレ %sさん、ご登録ありがとうございます。', $name);
        $this->text = $text;
        $this->events = $events;
        // dd($this);
        // dd($events);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this);
        // dd($events);
        // return $this->view('view.name');
        return $this
                    // ->view('emails.sample_notification')
                    ->text('emails.sample_notification_plain')
                    ->subject($this->title)
                    ->with([
                        'text' => $this->text,
                        'eventName' => $this->events->event_name,
                        'eventPrice' => $this->events->event_price,
                        
                      ]);
        
    }
}
