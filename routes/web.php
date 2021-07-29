<?php

use App\Http\Controllers\Admin\MainController as AdminMainController;
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

Route::prefix('admin')
	->name('admin.')
	->middleware(['auth', 'is.admin'])
	->group(function () {
		Route::get('/', [AdminMainController::class, 'index'])->name('index');
});;

/*=======================================================
*********************** Admin *************************
=======================================================*/
