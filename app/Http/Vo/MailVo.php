<?php

namespace App\Http\Vo;

class MailVo
{
    protected $userName = null;
    protected $toEmail = null;
<<<<<<< HEAD
    protected $password = null;
    protected $sendFrom = null;
    protected $subject = null;
    protected $bcc = null;
=======
    protected $pasword = null;
    protected $sendFrom = null;
    protected $subject = null;
    protected $bcc = null
>>>>>>> origin/master
    protected $bodyPath = null;

    public function setData($mailData)
    {
      $this->userName = $mailData['userName'];
      $this->toEmail = $mailData['toEmail'];
<<<<<<< HEAD
      $this->password = $mailData['password'];
      $this->sendFrom = $mailData['sendFrom'];
      $this->subject = $mailData['subject'];
      $this->bcc = $mailData['bcc'];
      $this->bodyPath = $mailData['bodyPath'];
=======
      $this->pasword = $mailData['pasword'];
      $this->sendFrom = $mailData['sendFrom'];
      $this->subject = $mailData['subject'];
      $this->bcc = $mailData['bcc'];
      $this->bodyPath = $mailData['bodyPath']
>>>>>>> origin/master
    }


    public function getUserName()
    {
      return $this->userName;
    }

    public function getToEmail()
    {
      return $this->toEmail;
    }

    public function getPassword()
    {
      return $this->pasword;
    }

    public function getSendFrom()
    {
      return $this->sendFrom;
    }

    public function getSubject()
    {
      return $this->subject;
    }

    public function getBcc()
    {
      return $this->bcc;
    }

    public function getBodyPath()
    {
      return $this->bodyPath;
    }

    public function getData()
    {
      return [
        'userName' => $this->userName,
        'toEmail' => $this->toEmail,
<<<<<<< HEAD
        'password' => $this->password,
=======
        'password' => $this->pasword,
>>>>>>> origin/master
        'sendFrom' => $this->sendFrom,
        'subject' => $this->subject,
        'bcc' => $this->bcc,
        'bodyPath' => $this->bodyPath
<<<<<<< HEAD
      ];
=======
      ]
>>>>>>> origin/master
    }
}
