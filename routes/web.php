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
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin/login',$base_admin.'\AuthController@login')->name('login');
Route::post('admin/login',$base_admin.'\AuthController@doLogin')->name('doLogin');
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

});
