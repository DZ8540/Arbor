<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutCompany;
use App\Models\CategoryType;

class BaseController extends Controller
{
	public $about_company;
	public $category_types;
	public $categories;

	public function __construct()
	{
		$about_company_columns = [
			'name',
			'work_start',
			'work_end',
			'email',
			'phone',
			'image',
			'description',
			'facebook',
			'vk',
			'instagram',
			'telegram',
			'address'
		];
		$this->about_company = AboutCompany::select($about_company_columns)->toBase()->first();

		$category_types_columns = ['id', 'name'];
		$this->category_types = CategoryType::select($category_types_columns)->get();
	}
}
