<?php

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
	if (Auth::check()) {
		return view('home');
	}
	else{
		return view('auth.login');
	}
    
})->name('home');


Route::resource('clients','ClientController')->middleware('auth');
Route::resource('transactions','TransactionController')->middleware('auth');

// Route::get('/clients','ClientController@index')->name('clients.index');
// Route::get('/clients/create','ClientController@create')->name('clients.create');
// //Route::get('/clients/show','ClientController@show')->name('clients.show');
// Route::get('/clients/edit','ClientController@edit')->name('clients.edit');
// Route::get('/clients/destroy','ClientController@destroy')->name('clients.destroy');


// Route::get('/clients', function () {
//     return ';
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
