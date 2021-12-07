<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToExpert extends Mailable
{
    use Queueable, SerializesModels;

    //public $filename;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct($request,$a)
    {
        $this->email_notif_to_expert = $request->email_notif_to_expert;
        $this->attachment = $request->attachment;
        $this->neep_req_id = $request->neep_req_id;

        $this->a=  $a;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email_body =  $this->email_notif_to_expert;
        foreach($this->a as $expert_id)
        {
            $response_url= url('/admin/neep_expert/response/'.$this->neep_req_id.'/'.$expert_id);
           // $decline_link = url('/admin/neep_requests/neep_request_expert_response/'.$this->neep_req_id.'/'.$expert_id);

            //$url = "<a href=\"$accept_link\">aa</a>";

    // str_replace(array('@accept_link','@decline_link'), array($accept_link,$decline_link ), $email_body)
            $mail =  $this->markdown('admin/send_mail_to_expert',['email_body'=>$email_body,'response_url'=>$response_url])->subject('NEEP Admin');
            //->attach($this->filename);

        }

        if ($this->attachment) {
            foreach($this->attachment as $file)
            {
                $mail->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(), 
                    'mime' => $file->getMimeType()
                ]);
            }
        }
    }
}
