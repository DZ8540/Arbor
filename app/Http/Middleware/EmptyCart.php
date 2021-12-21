<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EmptyCart
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if (empty($request->session()->get('cart', [])))
      return redirect()->route('user.cart');

    return $next($request);
  }
}
