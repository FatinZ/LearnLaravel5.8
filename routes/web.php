<?php

use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/contact', 'ContactFormController@create')->name('contact.create');
Route::post('/contact', 'ContactFormController@store')->name('contact.store');

Route::view('about', 'about')->middleware('test')->name('about');

// Route::get('/customers', 'CustomerController@index');
// Route::get('/customers/create', 'CustomerController@create');
// Route::post('/customers', 'CustomerController@store');
// Route::get('/customers/{customer}', 'CustomerController@show');
// Route::get('/customers/{customer}/edit', 'CustomerController@edit');
// Route::patch('/customers/{customer}', 'CustomerController@update');
// Route::delete('/customers/{customer}', 'CustomerController@destroy');

// All above may be condensed into this one single line because we followed the convention
Route::resource('/customers', 'CustomerController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
