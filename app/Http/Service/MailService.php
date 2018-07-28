<?php

namespace App\Http\Service;

use Mail;

class MailService
{
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public static function execute(MailVo $vo)
    {
        Mail::send(['text' => $vo->getBodyPat())], [
          "name" => $vo->getUserName(),
          "email" => $vo->getToEmail()
        ], function ($message) use ($vo) {
            $message->to($vo->getToEmail())->bcc($vo->getBcc())->subject($vo->getSubject());
        });
    }
}
