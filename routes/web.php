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

Route::get('/', 'Frontend\HomeController@index')->name('home');

Auth::routes(['register'=> false]);

Route::group(['as'=>'backend.', 'prefix'=>'admin', 'namespace'=>'Backend', 'middleware'=>['auth','admin']], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/settings', 'SettingController@create')->name('settings.create');
    Route::post('/settings/store', 'SettingController@store')->name('settings.store');
    Route::put('/settings/{settings}', 'SettingController@update')->name('settings.update');
    // Route::get('/add-branch', 'BranchController@create')->name('branch.create');
    // Route::get('/add-user', 'UserController@create')->name('user.create');
    // Route::get('/add-product', 'ProductController@create')->name('product.create');
    // Route::get('/add-bill', 'BillController@create')->name('bill.create');

    // Route::get('/list-branch', 'BranchController@index')->name('branch.index');
    // Route::get('/list-user', 'UserController@index')->name('user.index');
    // Route::get('/list-product', 'ProductController@index')->name('product.index');
    // Route::get('/list-bill', 'BillController@index')->name('bill.index');
    Route::resource('branch', 'BranchController');
    Route::resource('user', 'UserController');
    Route::resource('product', 'ProductController');
    Route::resource('bill', 'BillController');
    Route::resource('awb', 'AWBController');
});

// Route::get('/home', 'HomeController@index')->name('home');

