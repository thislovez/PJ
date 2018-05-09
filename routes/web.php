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



Route::get('admin/howtoimport','ExcelController@howtoimport');

Route::get('admin/count','NewsController@countItem');

Route::get('admin/sport/getImport','ExcelController@getImport');

Route::post('admin/sport/postImport','ExcelController@postImport');

Route::get('admin/sport/getExport','ExcelController@getExport');

// for redirect to facebook auth.
Route::get('auth/login/facebook', 'SocialLoginController@facebookAuthRedirect');
// facebook call back after login success.
Route::get('auth/login/facebook/index', 'SocialLoginController@facebookSuccess');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('admin/sport','Admin\SportnewController');

Route::get('admin/search','Admin\SportnewController@search');

Route::resource('admin/home','NewsController');

Route::resource('admin/express','ExpressController');

Route::resource('user/home','UserNewsController');

Route::resource('user/profile','UserProfileController');

Route::get('admin/sport/{sp_id}/express/','Admin\SportnewController@GetExpress');

Route::get('admin/report',[
	'uses' => 'ReportController@index',
	'as' => 'admin.report'
]);

Route::get('admin/report/{sp_id}/return','ReportController@Return');

Route::get('admin/sport/{sp_id}/PostExpress',[
	'uses' => 'Admin\SportnewController@PostExpress',
	'as' => 'admin.sport.express_sp'
]);

Route::get('user/borrow',[
	'uses' => 'BorrowController@getIndex',
	'as' => 'user.borrow'
]);

Route::get('user/borrow/add-to-cart/{sp_id}',[
	'uses' => 'BorrowController@getAddToCart',
	'as' => 'user.addToCart'
]);

Route::get('user/borrow/reduce/{sp_id}',[
	'uses' => 'BorrowController@getReduceByOne',
	'as' => 'user.reduceByOne'
]);

Route::get('user/borrow/remove/{sp_id}',[
	'uses' => 'BorrowController@getRemoveItem',
	'as' => 'user.remove'
]);

Route::get('user/borrow/sport-cart',[
	'uses' => 'BorrowController@getCart',
	'as' => 'user.sportCart'
]);

Route::get('user/borrow/checkout/',[
	'uses' => 'BorrowController@getCheckout',
	'as' => 'user.CheckOut'

]);

Route::get('/user/report',[
		'uses' => 'BorrowController@getRepost',
		'as' => 'user.repost'
	]);


Route::get('vertifyEmailFirst','Auth\RegisterController@vertifyEmailFirst')->name('vertifyEmailFirst');

Route::get('vertify/{email}/{vertifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');