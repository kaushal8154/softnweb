<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class SendStatusUpdateEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $complaint; 

    public function __construct($complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $useremail = $this->complaint['useremail']; 
        //$useremail = 'kaushalkapadiya@gmail.com'; 
        $mailBody = array('username'=>$this->complaint['username'],'complaint_sub'=>$this->complaint['complaint_sub']);
        Mail::send('mails.complaint',$mailBody, function($message) use ($useremail)
        {    
            $message->to($useremail)->subject('Complaint Resolved');    
        });
    }
}
