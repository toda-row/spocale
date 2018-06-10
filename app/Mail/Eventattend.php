<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Eventattend extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $options;
    protected $content;
    protected $attach;
     
    public function __construct()
    {
        //
        $this->options = $options;
        $this->content = $content;
        $this->attach  = $attach;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this
            ->from($options['from'], $options['from_name'])
            ->subject($options['subject'])
            ->attachData($this->attach['binary'], $this->attach['file_name'])
            ->view('emails.sample_notification_plain')
            ->with([
                'content' => $content,
            ]);
    }
}


// $message->from($address, $name = null);
// $message->sender($address, $name = null);
// $message->to($address, $name = null);
// $message->cc($address, $name = null);
// $message->bcc($address, $name = null);
// $message->replyTo($address, $name = null);
// $message->subject($subject);
// $message->priority($level);
// $message->attach($pathToFile, array $options = []);

// // Attach a file from a raw $data string...
// $message->attachData($data, $name, array $options = []);

// // Get the underlying SwiftMailer message instance...
// $message->getSwiftMessage();