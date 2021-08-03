<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannersAdditionRequest;
use App\Models\BannersAddition;
use Illuminate\Http\Request;

class BannersAdditionController extends Controller
{
  public function index()
  {
    $columns = ['title', 'description', 'link'];
    $banner = BannersAddition::select($columns)->toBase()->first();
    return view('Admin.addition_banner', compact('banner'));
  }

  public function update(BannersAdditionRequest $request, BannersAddition $banner)
  {
    dd($request->all(), $banner);
  }
}
