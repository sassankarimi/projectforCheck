<?php
/**
 * Created by PhpStorm.
 * User: Sassan
 * Date: 9/23/2018
 * Time: 3:53 PM
 */

namespace App;


use Illuminate\Mail\Mailer;

class AppMailer
{
protected $to;
protected $from='waffen_ss@gmail.com';
protected $view='emails.confirm';
protected $data;
protected $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer=$mailer;
    }

    public function sendEmailToConfirm(User $user)
    {
        //dd($user);
        $this->to=$user->email;
        $this->data=compact('user');
        $this->delivery();

    }

    public function delivery()
    {
      $this->mailer->send($this->view,$this->data, function ($message)  {
          $message->from($this->from,'Sassan');
          $message->to($this->to)->subject('from ss!');
      });
    }


}