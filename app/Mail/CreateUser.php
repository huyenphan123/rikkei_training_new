<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password, $name)
    {
        $this->password = $password;
        $this->name = $name;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Your password for account '.$this -> name)
            ->view('emails/changepass')
            ->with([
                'name' => $this -> name,
                'password'=>$this->password,

            ]);
    }
}
