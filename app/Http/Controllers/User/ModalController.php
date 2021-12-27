<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\CallModalRequest;
use App\Mail\CallModalMailer;
use Illuminate\Support\Facades\Mail;

class ModalController extends CartController
{
  public function call(CallModalRequest $request) {
    Mail::to('dilavar.zavkiev@mail.ru')->send(new CallModalMailer($request->all()));
    return redirect()->route('user.index')->with('success', 'Заявка была успешно отправлена!');
  }
}
