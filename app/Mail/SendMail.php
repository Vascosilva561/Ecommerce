<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;  
    //private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user; 

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from('eeduardocavungo@gmail.com')->subject('New costumer enquiry')->view('thankyou')->with('data', $this->data );

    }
}
