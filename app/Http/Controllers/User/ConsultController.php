<?php

namespace App\Http\Controllers\User;

use App\Http\Providers\User\ConsultProvider;
use App\Http\Requests\User\CallModalRequest;
use App\Http\Requests\User\FindProductConsultRequest;

class ConsultController extends CartController
{
  public function call(CallModalRequest $request, ConsultProvider $provider)
  {
    $is_sended = $provider->call($this->about_company->call_email, $request->all());

    if ($is_sended)
      return redirect()->route('user.index')->with('success', 'Заявка была успешно отправлена!');
    else
      return redirect()->route('user.index')->with('danger', 'Что то пошло не так, попробуйте еще раз!');
  }

  public function find_product(FindProductConsultRequest $request, ConsultProvider $provider)
  {
    $is_sended = $provider->find_product($this->about_company->call_email, $request->except('check'));

    if ($is_sended)
      return redirect()->route('user.index')->with('success', 'Заявка была успешно отправлена!');
    else
      return redirect()->route('user.index')->with('danger', 'Что то пошло не так, попробуйте еще раз!');
  }
}
