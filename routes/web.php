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

//Get

Route::get('/', 'PagesController@home');

Route::get('home', 'PagesController@home');

Route::get('/about', 'PagesController@about');

Route::get('/contact', 'TicketsController@create');

Route::get('/tickets','TicketsController@index');

Route::get('/tickets/{slug?}', 'TicketsController@show');

Route::get('/tickets/{slug?}/edit', 'TicketsController@edit');

Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('ttphong0812@gmail.com', 'Learning Laravel');

        $message->to('ttphong0812@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');

Route::get('users/logout', 'Auth\LoginController@logout');

Route::get('users/login', 'Auth\LoginController@showLoginForm') ->name('login');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager')
, function () {
	Route::get('users', [ 'as' => 'admin.user.index', 'uses' =>'UsersController@index']);
	Route::get('roles', 'RolesController@index');
	Route::get('roles/create', 'RolesController@create');
	Route::post('roles/create', 'RolesController@store');
	Route::get('users/{id}/edit', 'UsersController@edit');
	Route::post('users/{id}/edit','UsersController@update');
	Route::get('/', 'PagesController@home');
});

//Post

Route::post('/contact','TicketsController@store');

Route::post('/tickets/{slug?}/edit', 'TicketsController@update');

Route::post('/tickets/{slug?}/delete','TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');

Route::post('users/register', 'Auth\RegisterController@register');

Route::post('users/login', 'Auth\LoginController@login');
