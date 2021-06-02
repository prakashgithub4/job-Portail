<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Registermail extends Mailable
{
    use Queueable, SerializesModels;
     protected $employeer_id ;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($emplyeer_id)
    {
        //
        $this->employeer_id = $emplyeer_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $id = encrypt($this->employeer_id);
        return $this->view('mail',compact('id'));
    }
}
