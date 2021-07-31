<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Models\CategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class MainController extends BaseController
{
	public function index() 
  {
		return view('Admin.index');
	}

	public function category_types() 
  {
		$category_types = CategoryType::get();
		return view('Admin.category_types', compact('category_types'));
	}
}