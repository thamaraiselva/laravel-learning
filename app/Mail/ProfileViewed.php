<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfileViewed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($viewed_profile_data,$user)
    {
        $this->user =$user->profile;
        $this->to_mail_id=$viewed_profile_data->email;
        // dump($this->to_mail_id);
        // dump($user->profile->profile_url); // url 
        // dd($viewed_profile_data); 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.profile.viewed')
                ->with([
                    'user' => $this->user,
                ]);
    }
}
