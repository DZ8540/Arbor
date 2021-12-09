<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Providers\User\BaseProvider;

class BaseController extends Controller
{
	public $about_company;
	public $category_types;
	public $categories;

	public function __construct(BaseProvider $provider)
	{
    $data = $provider->get_default_data();

    $this->about_company = $data['about_company'];
		$this->category_types = $data['category_types'];
	}
}
