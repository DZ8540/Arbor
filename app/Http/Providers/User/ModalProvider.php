<?php

namespace App\Http\Providers\User;

use App\Mail\CallModalMailer;
use Illuminate\Support\Facades\Mail;

class ModalProvider extends CartProvider
{
  public function call($call_email, $data)
  {
    if ($call_email != null) {
      Mail::to($call_email)->send(new CallModalMailer($data));
      return true;
    }

    return false;
  }
}
