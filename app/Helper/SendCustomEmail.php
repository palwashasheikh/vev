<?php

namespace App\Helper;

class SendCustomEmail
{

    private static $data=array('name'=>'veve');
    public static function textEmail() {
      $isMailSent=Mail::send('mail', self::$data, function($message) {
         $message->to('palwashasheikh229@gmail.com', 'palwasha')->subject('Veve testing email');
         $message->from('no-reply@solad.com','veve Support');
      });
      $isMailSent=($isMailSent) ? true : false;
      return $isMailSent;
   }

   public function html_email() {
      Mail::send('mail', $this->data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $this->data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

}
