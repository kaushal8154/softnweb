<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendSignupNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    
    public function __construct()
    {
        //        
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        //
        $user = $event->user;        
        /** Send Admin email  */

        $adminemail = 'kaushalkapadiya@gmail.com'; 
        $mailBody = array('firstname'=>$user->firstname,'lastname'=>$user->lastname);
        Mail::send('mails.registration',$mailBody, function($message) use ($adminemail)
        {    
            $message->to($adminemail)->subject('LaravelDemo - New User came ');    
        });

        /** ------------------  */
    }
}
