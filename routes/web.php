<?php

use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BannersAdditionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ThicknessController;
use App\Http\Controllers\User\MainController as UserMainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*=======================================================
************************ User **************************
=======================================================*/

Route::name('user.')->group(function () {
	Route::get('/', [UserMainController::class, 'index'])->name('index');

	Route::get('/about', [UserMainController::class, 'about'])->name('about');

	Route::get('/services', [UserMainController::class, 'services'])->name('services');

	Route::get('/news', [UserMainController::class, 'news'])->name('news');

	Route::get('/news/{slug}', [UserMainController::class, 'news_item'])->name('news.item');

	Route::get('/catalog', [UserMainController::class, 'catalog'])->name('catalog');

	Route::get('/catalog/{slug}', [UserMainController::class, 'category'])->name('category');

	Route::get('/catalog/{category_slug}/{product_slug}', [UserMainController::class, 'product'])->name('product');

	Route::get('/cart', [UserMainController::class, 'cart'])->name('cart');

	Route::get('/order', [UserMainController::class, 'order'])->name('order');
});

/*=======================================================
************************ User **************************
=======================================================*/



/*=======================================================
*********************** Admin *************************
=======================================================*/

Route::name('admin.')
	->prefix('admin')
	->middleware(['auth', 'is.admin'])
	->group(function() {
	// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

	// Route::post('login', [LoginController::class, 'login']);
	// Route::post('logout', [LoginController::class, 'logout']);

	// Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
	// Route::post('register', [RegisterController::class, 'register'])->name('register');

	Route::get('/', [AdminMainController::class, 'index'])->name('index');

	Route::get('/category_types', [AdminMainController::class, 'category_types'])->name('category.types');
	
	Route::resource('/categories', CategoryController::class);

  Route::resource('/colors', ColorController::class);

  Route::resource('/manufacturers', ManufacturerController::class);

  Route::resource('/thicknesses', ThicknessController::class);

  Route::get('/about_company', [AboutCompanyController::class, 'index'])->name('about.company.index');
  Route::patch('/about_company', [AboutCompanyController::class, 'update'])->name('about.company.update');

	Route::resource('/products', ProductController::class);

	Route::resource('/banners', BannerController::class);

	Route::resource('/news', NewsController::class);
});

/*=======================================================
*********************** Admin *************************
=======================================================*/