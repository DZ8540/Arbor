<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;

class MainController extends BaseController
{
	public function index() {
		return view('Admin.index');
	}
}
