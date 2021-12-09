<?php

namespace App\Http\Providers\User;

use App\Models\AboutCompany;
use App\Models\CategoryType;

class BaseProvider
{
  public function get_default_data()
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
		$about_company = AboutCompany::select($about_company_columns)->toBase()->first();

		$category_types_columns = ['id', 'name'];
		$category_types = CategoryType::select($category_types_columns)->get();

    return compact('about_company', 'category_types');
  }
}
