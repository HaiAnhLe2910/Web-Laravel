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

Route::view('/', 'home');
Route::resource('/product','ItemController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('user','ShowProfile@update')->middleware('auth');
Route::get('/item/{id}','ItemController@show')->name('item.show');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::delete('/comments/{id}', 'CommentController@delete')->name('comment.delete');

Route::get('/admin/{id}', 'AdminController@index')->middleware('is_admin')->name('admin');
Route::post('/item/store', 'AdminController@store')->name('item.store');
Route::get('/item/edit/{id}','AdminController@edit');
Route::post('/item/update/{id}','AdminController@update')->name('item.update');
Route::delete('/item/{id}', 'AdminController@delete')->name('item.delete');
Route::group(['middleware'=> ['auth'||'isadmin']],function()
{
    Route::get('/profile','ShowProfile@show');

});

Route::post('/user/upload', 'ShowProfile@upload')->name('user.upload');

Route::get('/export_excel', 'PdfController@index')->middleware('is_admin')->name('export_excel.index');
Route::get('/export_excel/export', 'PdfController@export')->middleware('is_admin')->name('export_excel.export');

