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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/banned', 'Auth\UserController@banned')->name('banned');


// Collections
Route::prefix('collections')->name('collections.')->group(function () {
    Route::get('/', 'CollectionsController@index')->name('books');
    Route::get('/{Book}', 'BooksController@book')->name('book');
    Route::get('/author/{Author}', 'CollectionsController@author')->name('author');
    Route::get('/category/{Category}', 'CollectionsController@category')->name('category');
    Route::get('/publisher/{Publisher}', 'CollectionsController@publisher')->name('publisher');
    Route::post('/search', 'CollectionsController@search')->name('search');
    Route::get('/search', 'CollectionsController@search')->name('search');
});

// Requests
Route::group(['prefix' => 'requests'], function () {
    Route::get('/', 'BarrowController@requests')->name('requests');
    Route::get('/history', 'BarrowController@requests_history')->name('requests-history');
    Route::post('/apply/{book}', 'Auth\BarrowController@apply')->name('apply.item');
    Route::delete('/cancel/{book_id}', 'Auth\BarrowController@cancel')->name('cancel.item');

});

// Profile
Route::get('/profile', 'Auth\UserController@profile')->name('profile');
Route::post('/profile', 'Auth\UserController@update')->name('profile');


Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');
    // Users
    Route::resource('/users', 'Admin\UserController')->except(['show', 'destroy']);
    // User barrow operation
    Route::post('/users/edit/{userID}/barrow/{barrowID}', 'Admin\UserController@bookStatus')->name('bookStatus');
    // Book
    Route::resource('/books', 'Admin\BookController')->except(['show']);
    // Barrows
    Route::resource('/barrows', 'Admin\BarrowController')->except(['show', 'destroy']);
    // Authors
    Route::resource('/authors', 'Admin\AuthorController')->except(['show']);
    // Publishers
    Route::resource('/publishers', 'Admin\PublisherController')->except(['show']);
    // Logs
    Route::get('/logs', 'Admin\LogController@index')->name('logs.index');
    // Email
    Route::post('/users/edit/{userID}/mail', 'Admin\EmailController@sendMail')->name('emails.send');


});
