<?php

use App\Http\Controllers\Admin\AboutCompanyController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ThicknessController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\MainController as UserMainController;
use App\Http\Controllers\User\NewsController as UserNewsController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProductController as UserProductController;
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

Auth::routes();

/*=======================================================
************************ User **************************
=======================================================*/

Route::name('user.')->group(function() {
	Route::get('/', [UserMainController::class, 'index'])->name('index');

	Route::get('/about', [UserMainController::class, 'about'])->name('about');

	Route::get('/services', [UserMainController::class, 'services'])->name('services');

	Route::get('/news', [UserNewsController::class, 'news'])->name('news');
	Route::get('/news/{slug}', [UserNewsController::class, 'news_item'])->name('news.item');

	Route::get('/catalog', [UserProductController::class, 'catalog'])->name('catalog');
	Route::get('/catalog/{slug}', [UserProductController::class, 'category'])->name('category');
	Route::get('/catalog/{category_slug}/{product_slug}', [UserProductController::class, 'product'])->name('product');

	Route::get('/cart', [CartController::class, 'cart'])->name('cart');
  Route::post('/cart/{id}', [CartController::class, 'add_to_cart'])->name('cart.add');
  Route::patch('/cart/{id}', [CartController::class, 'remove_from_cart'])->name('cart.remove');
  Route::delete('/cart/{id}', [CartController::class, 'delete_from_cart'])->name('cart.delete');

  Route::post('/cart/service/{id}', [CartController::class, 'add_service'])->name('cart.service.add');
  Route::patch('/cart/service/{id}', [CartController::class, 'remove_service'])->name('cart.service.remove');
  Route::delete('/cart/service/{id}', [CartController::class, 'delete_service'])->name('cart.service.delete');

  Route::middleware('empty.cart')->group(function() {
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::post('/order', [OrderController::class, 'order_add'])->name('order.add');
  });
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

  Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders');
  Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->name('orders.show');
  Route::delete('/orders/{id}', [AdminOrderController::class, 'delete'])->name('orders.delete');
});

/*=======================================================
*********************** Admin *************************
=======================================================*/