<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\ModalProvider;
use App\Http\Requests\User\CallModalRequest;

class ModalController extends CartController
{
  public function call(CallModalRequest $request, ModalProvider $provider) {
    $is_sended = $provider->call($this->about_company->call_email, $request->all());

    if ($is_sended)
      return redirect()->route('user.index')->with('success', 'Заявка была успешно отправлена!');
    else
      return redirect()->route('user.index')->with('danger', 'Что то пошло не так, попробуйте еще раз!');
  }
}
