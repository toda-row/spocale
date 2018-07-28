<?php

namespace App\Http\Vo;

class MailVo
{
    protected $userName = null;
    protected $toEmail = null;
    protected $pasword = null;
    protected $sendFrom = null;
    protected $subject = null;
    protected $bcc = null
    protected $bodyPath = null;

    public function setData($mailData)
    {
      $this->userName = $mailData['userName'];
      $this->toEmail = $mailData['toEmail'];
      $this->pasword = $mailData['pasword'];
      $this->sendFrom = $mailData['sendFrom'];
      $this->subject = $mailData['subject'];
      $this->bcc = $mailData['bcc'];
      $this->bodyPath = $mailData['bodyPath']
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
        'password' => $this->pasword,
        'sendFrom' => $this->sendFrom,
        'subject' => $this->subject,
        'bcc' => $this->bcc,
        'bodyPath' => $this->bodyPath
      ]
    }
}
