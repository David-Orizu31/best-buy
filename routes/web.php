<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageRouteController;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
  Route::get('/{subdomain}/products',  [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');

Route::get('/products/show/{row}',[App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
Route::get('/featured', [App\Http\Controllers\ProductsController::class, 'featured'])->name('featured');
Route::post('/cart', [App\Http\Controllers\CartController::class, 'store'])->name('cart.store');
Route::get('/cartitems', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{product}',  [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');

Route::patch('/cart/{product}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
Route::post('/billing', [App\Http\Controllers\CartController::class, 'billing'])->name('cart.billing');
// Route::get('/products/{subdomain}', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');

Route::post('/paynow', 'CheckoutController@initialize')->name('paynow');
Route::get('/rave/callback', 'CheckoutController@callback')->name('callback');

Route::get('/transactions', 'CheckoutController@flutterwavelist')->name('t');

Route::get('/contact-us', 'PageRouteController@contact')->name('contact');

Route::get('/about-us', 'PageRouteController@about')->name('about');

Route::get('/about/mission', 'PageRouteController@mission')->name('about.mission');

Route::get('/about/values', 'PageRouteController@values')->name('about.values');

Route::get('/about/history', 'PageRouteController@history')->name('about.history');

Route::get('/faqs', 'PageRouteController@faqs')->name('faqs');

Route::get('/terms', 'PageRouteController@terms')->name('terms');

Route::get('/new-products', 'PageRouteController@newproducts')->name('newproducts');

Route::get('/items/{id}', [PageRouteController::class, 'maincategory'])->name('categoryshows.maincategory');

Route::get('/sub-items/{id}', [PageRouteController::class, 'category'])->name('categoryshows.category');

Route::get('/sub-sub-items/{id}', [PageRouteController::class, 'subcategory'])->name('categoryshows.subcategory');

// Route::get('/dashboard/overview', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('dashboard.overview');
// Route::get('/dashboard/recently-viewed', [App\Http\Controllers\DashboardController::class, 'recently'])->name('dashboard.recentlyviewed');
// Route::get('/dashboard/coupon', [App\Http\Controllers\DashboardController::class, 'coupon'])->name('dashboard.coupon');
// Route::get('/dashboard/messages', [App\Http\Controllers\DashboardController::class, 'messages'])->name('dashboard.messages');
// Route::get('/dashboard/orders', [App\Http\Controllers\DashboardController::class, 'orders'])->name('dashboard.orders');
// Route::get('/dashboard/add-items', [App\Http\Controllers\DashboardController::class, 'additems'])->name('dashboard.additems');
// Route::post('/dashboard/add-items', [App\Http\Controllers\DashboardController::class, 'saveitems'])->name('dashboard.saveitems');
// Route::get('/dashboard/view-items-added', [App\Http\Controllers\DashboardController::class, 'viewitems'])->name('dashboard.viewitems');
// Route::get('/dashboard/contact-support', [App\Http\Controllers\DashboardController::class, 'support'])->name('dashboard.support');
// Route::get('/dashboard/edit-profile', [App\Http\Controllers\DashboardController::class, 'editprofile'])->name('dashboard.editprofile');
// Route::post('/dashboard/edit-profile', [App\Http\Controllers\DashboardController::class, 'updateprofile'])->name('dashboard.editprofile');
// Route::get('/dashboard/changepass', [App\Http\Controllers\DashboardController::class, 'changepass'])->name('dashboard.changepass');
// Route::post('/dashboard/changepass', [App\Http\Controllers\DashboardController::class, 'updatepassword'])->name('dashboard.changepass');

Route::post('/sendmail', [App\Http\Controllers\ContactUsController::class, 'sendmail'])->name('sendmail');
