<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AboutCompanyRequest;
use App\Models\AboutCompany;
use Illuminate\Support\Facades\Storage;

class AboutCompanyController extends Controller
{
  public function index() 
  {
    $columns = [
      'name',
      'description',
      'work_start',
      'work_end',
      'email',
      'phone',
      'logo',
      'adress',
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

    if ($request->has('logo')) {
      $path = $request->file('logo')->store('public/About');
      $params['logo'] = $path;
    }

    if (!empty($about->first()->logo)) {
      Storage::delete($about->first()->logo);
    }

    $about->first()->update($params);
    return redirect()->route('admin.about.company.index')->with('success', 'Данные успешно сохранены');
  }
}