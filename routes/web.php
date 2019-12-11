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
    return view('welcome');
});

Route::middleware(['ipcheck'])->group(function() {
	Route::get('/contact', function () {
	    return view('contact');
	});

});

Route::get('/about', function () {
	    return view('about');
	});

/*
below the way we could add route for individual
*/
// Route::get('/contact', function () {
//     return view('contact');
// })->middleware('ipcheck');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profile', 'ProfileController');

Route::get('profile/{user}', function (User $user) {
    return $user->email;
});


Route::get('/profiles','ProfileController@all_profiles');

Route::any('view/{slug}', 'ProfileController@view'); 

/* 
	routing for task scheluding
*/

Route::post('/add_board','BoardsController@store');
