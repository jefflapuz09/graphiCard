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

// Route::get('/', function () {
//     return view('Home.index');
// });

Auth::routes();

Route::get('/loginto', 'Auth\LoginController@index')->name('loginto');
Route::get('/admin', 'adminController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@getLogout');
Route::get('/about', 'HomeController@aboutPage');
Route::get('/prodDescription/{id}', 'HomeController@prodDescription');

//Service Category
Route::get('/Category', 'categoryController@index');
Route::get('/CategoryCreate', 'categoryController@create');
Route::get('/CategoryShow/{id}', 'categoryController@show');
Route::get('/CategoryUpdate/{id}', 'categoryController@edit');
Route::get('/CategoryDeac/{id}', 'categoryController@destroy');
Route::get('/CategorySoft', 'categoryController@soft');
Route::get('/CategoryReactivate/{id}', 'categoryController@reactivate');

Route::post('/CategoryStore', 'categoryController@store');
Route::post('/CategoryEdit/{id}', 'categoryController@update');

//Customer
Route::get('/Customer', 'customerController@index');
Route::get('/CustomerCreate', 'customerController@create');
Route::get('/CustomerShow/{id}', 'customerController@show');
Route::get('/CustomerUpdate/{id}', 'customerController@edit');
Route::get('/CustomerDeac/{id}', 'customerController@destroy');
Route::get('/CustomerSoft', 'customerController@soft');
Route::get('/CustomerReactivate/{id}', 'customerController@reactivate');

Route::post('/CustomerStore', 'customerController@storepost');
Route::post('/CustomerEdit/{id}', 'customerController@update');

//Service Type
Route::get('/ServiceType', 'serviceTypeController@index');
Route::get('/ServiceTypeCreate', 'serviceTypeController@create');
Route::get('/ServiceTypeShow/{id}', 'serviceTypeController@show');
Route::get('/ServiceTypeUpdate/{id}', 'serviceTypeController@edit');
Route::get('/ServiceTypeDeac/{id}', 'serviceTypeController@destroy');
Route::get('/ServiceTypeSoft', 'serviceTypeController@soft');
Route::get('/ServiceTypeReactivate/{id}', 'serviceTypeController@reactivate');

Route::post('/ServiceTypeStore', 'serviceTypeController@store');
Route::post('/ServiceTypeEdit/{id}', 'serviceTypeController@update');

//Post
Route::get('/Post','postController@index');
Route::get('/PostCreate','postController@create');
Route::get('/PostDraft/{id}','postController@publish');
Route::get('/PostEdit/{id}','postController@edit');
Route::get('/PostDeactivate/{id}', 'postController@destroy');
Route::get('/PostSoft','postController@soft');
Route::get('/PostReactivate/{id}', 'postController@reactivate');
Route::get('/PostShow/{id}', 'postController@show');
Route::get('/PostType/{id}','postController@type');

Route::post('/PostStore', 'postController@store');
Route::post('/PostUpdate/{id}', 'postController@update');