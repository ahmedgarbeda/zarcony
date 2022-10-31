<?php

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

$base_admin = 'App\Http\Controllers\Admin';
$base_front = 'App\Http\Controllers';

Route::get('/', $base_front.'\HomeController@products')->name('products');
Route::get('brands',$base_front.'\HomeController@brands')->name('brands');
Route::get('brand-products/{brand_id}',$base_front.'\HomeController@brandProducts')->name('brand-products');
Route::get('product-details/{product_id}',$base_front.'\HomeController@productDetails')->name('product-details');
Route::get('register',$base_front.'\AuthController@register')->name('register');
Route::post('register',$base_front.'\AuthController@doRegister')->name('do-register');
Route::get('login',$base_front.'\AuthController@login')->name('login');
Route::post('login',$base_front.'\AuthController@doLogin')->name('do-login');
Route::group(['middleware' => 'auth'],function () use ($base_front){
    Route::post('logout',$base_front.'\AuthController@logout')->name('logout');
    Route::get('add-to-cart/{product_id}',$base_front.'\CartController@addToCart')->name('add-to-cart');
    Route::get('cart',$base_front.'\CartController@getCartItems')->name('cart');
    Route::delete('delete-cart-item/{cart_item_id}',$base_front.'\CartController@deleteCartItem')->name('delete-cart-item');
    Route::post('update-cart-data',$base_front.'\CartController@updateCartData')->name('update-cart-data');
    Route::get('checkout',$base_front.'\CheckoutController@checkout')->name('checkout');
    Route::post('checkout', $base_front.'\CheckoutController@doCheckout')->name('do-checkout');
});


Route::get('admin/login',$base_admin.'\AuthController@login')->name('admin.login');
Route::post('admin/login',$base_admin.'\AuthController@doLogin')->name('admin.doLogin');
Route::group(['middleware' => ['auth','IsAdmin'],'prefix' => 'admin'],function () use ($base_admin){
    Route::get('/',$base_admin.'\HomeController@index')->name('admin.index');
    Route::post('logout',$base_admin.'\AuthController@logout')->name('admin.logout');

    Route::resource('brand',$base_admin.'\BrandController');
    Route::get('datatables/brands',$base_admin.'\BrandController@datatables');
    Route::get('get-brands',$base_admin.'\BrandController@getBrands')->name('get-brands');

    Route::resource('product',$base_admin.'\ProductController');
    Route::get('datatables/products',$base_admin.'\ProductController@datatables');

    Route::get('orders',$base_admin.'\OrderController@index')->name('orders.index');
    Route::get('datatables/orders',$base_admin.'\OrderController@datatables')->name('orders.datatables');
    Route::get('orders/{order}',$base_admin.'\OrderController@show')->name('orders.show');
    Route::put('orders/{order}',$base_admin.'\OrderController@update')->name('orders.update');

    Route::get('users',$base_admin.'\UserController@index')->name('users.index');
    Route::get('datatables/users',$base_admin.'\UserController@datatables');

    Route::resource('admins',$base_admin.'\AdminController');
    Route::get('datatables/admins',$base_admin.'\AdminController@datatables');

});
