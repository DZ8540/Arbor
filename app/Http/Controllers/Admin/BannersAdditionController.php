<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\BannersAdditionRequest;
use App\Models\BannersAddition;
use Illuminate\Http\Request;

class BannersAdditionController extends BaseController
{
	public function __construct()
	{
		$this->columns = ['id', 'title', 'description', 'link'];
    $this->banner = BannersAddition::select($this->columns)->first();
	}

  public function index()
  {
		return view('Admin.addition_banner', [
			'banner' => $this->banner,
			'check_banner' => $this->check_banner()
		]);
  }

  public function update(BannersAdditionRequest $request)
  {
    $banner = BannersAddition::first();

		if (!$this->check_banner()) {
			$banner = BannersAddition::create($request->all());
			return redirect()->route('admin.addition.banner.index', compact('banner'))->with('success', 'Специальный баннер был создан');
		}

		$banner->update($request->all());
		return redirect()->route('admin.addition.banner.index', compact('banner'))->with('success', 'Специальный баннер был обновлен');
  }

	private function check_banner()
	{
		return $this->banner ? true : false;
	}
}
