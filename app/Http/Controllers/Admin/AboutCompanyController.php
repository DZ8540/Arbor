<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\AboutCompanyRequest;
use App\Models\AboutCompany;
use Illuminate\Support\Facades\Storage;

class AboutCompanyController extends BaseController
{
  public function index() 
  {
    $columns = [
      'name',
      'description',
      'work_start',
      'work_end',

      'email',
      'call_email',

      'phone',
      'commercial_phone',
      'other_phone_1',
      'other_phone_2',
      'other_phone_3',

      'image',
      'address',
      'vk',
      'facebook',
      'instagram',
      'telegram',
    ];
    $about = AboutCompany::select($columns)->toBase()->first();
    return view('Admin.about_company', compact('about'));
  }

  public function update(AboutCompanyRequest $request, AboutCompany $about)
  {
    $params = $request->all();

    if ($request->has('image')) {
      Storage::delete($about->first()->image);
      $path = $request->file('image')->store('public/About');
      $params['image'] = $path;
    }

    $about->first()->update($params);
    return redirect()->route('admin.about.company.index')->with('success', 'Данные успешно сохранены');
  }
}