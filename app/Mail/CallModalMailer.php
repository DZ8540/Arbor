<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallModalMailer extends Mailable
{
  use Queueable, SerializesModels;

  public $call;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($call)
  {
    $this->call = $call;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('Mail.call_modal_mailer');
  }
}
