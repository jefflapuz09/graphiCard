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

//website
Route::get('/loginto', 'Auth\LoginController@index')->name('loginto');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@getLogout');
Route::get('/about', 'HomeController@aboutPage');
Route::get('/prodDescription/{id}/{type}/{item}', 'HomeController@prodDescription');
Route::get('/Testimonial','HomeController@testimonial');
Route::get('/ServiceItem/{id}', 'HomeController@item');
Route::get('/admin', 'adminController@index');
Route::post('/InquirySend','InquiryController@store');
Route::get('/AllItems','HomeController@allItems');
Route::get('/FAQs','FAQController@index');
Route::get('/Order','HomeController@order');
Route::post('/ReviewStore', 'FeedbackController@review');
Route::get('/website/package','HomeController@package');
Route::get('/myaccount','HomeController@custDashboard');
Route::get('customer/payment','HomeController@payment');

Route::get('/Search','HomeController@search');
Route::post('/SearchResult','HomeController@searchresult');

Route::post('/customer/cart/{id}/{itemid}','HomeController@cart');
Route::get('/customer/cart/view','HomeController@viewcart');
Route::get('/customer/cart/{id}/remove','HomeController@removecart');
Route::post('/customer/cart/checkout','HomeController@checkout');

Route::get('/customer/login','HomeController@custLogin');
Route::get('/customer/register','HomeController@custRegister');
Route::post('/customer/register/post','customerController@storeweb');
Route::post('/customer/login/post','HomeController@custLog');

Route::get('/cartPost/{id}/{itemid}','OrderController@addcart');
Route::get('/cartPack/{id}','OrderController@cartPack');
Route::post('/customer/cartPack/{id}','HomeController@cartPackage');

//error
Route::get('/Restricted','Homecontroller@error');
Route::get('/RestrictedAuth','Homecontroller@error2');

Route::group(['middleware' => 'App\Http\Middleware\adminMiddleware'], function () {
    
//bank
Route::get('/Bank','BankController@index');
Route::get('/BankCreate','BankController@create');
Route::get('/BankUpdate/{id}','BankController@edit');
Route::get('/BankDeac/{id}', 'BankController@destroy');
Route::get('/BankSoft', 'BankController@soft');
Route::get('/BankReactivate/{id}', 'BankController@reactivate');

Route::post('/BankStore','BankController@store');
Route::post('/BankEdit/{id}','BankController@update');

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
Route::post('/CustomerWebStore', 'customerController@storepost');
Route::post('/CustomerEdit/{id}', 'customerController@update');

//Service Subcategory
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
Route::get('/PostUnpub/{id}','postController@unpublish');
Route::get('/PostEdit/{id}','postController@edit');
Route::get('/PostDeactivate/{id}', 'postController@destroy');
Route::get('/PostSoft','postController@soft');
Route::get('/PostReactivate/{id}', 'postController@reactivate');
Route::get('/PostShow/{id}', 'postController@show');
Route::get('/PostType/{id}','postController@type');
Route::get('/PostSub/{id}','postController@sub');

Route::post('/PostStore', 'postController@store');
Route::post('/PostUpdate/{id}', 'postController@update');

//Utilities
Route::get('/Utilities', 'UtilitiesController@index');

Route::post('/UtilitiesUpdate/{id}', 'UtilitiesController@update');
Route::post('/UtilityStore', 'UtilitiesController@store');

//Inquiry
Route::get('/InquiryRead','InquiryController@read');
Route::get('/InquiryView/{id}','InquiryController@show');
Route::post('/InquiryUpdate/{id}','InquiryController@update');

//ServiceItem
Route::get('/Item','serviceItemController@index');
Route::get('/ItemCreate','serviceItemController@create');
Route::get('/ItemEdit/{id}','serviceItemController@edit');
Route::get('/ItemDeactivate/{id}', 'serviceItemController@destroy');
Route::get('/ItemReactivate/{id}', 'serviceItemController@reactivate');
Route::get('/ItemSoft', 'serviceItemController@soft');

Route::post('/ItemStore', 'serviceItemController@store');
Route::post('/ItemUpdate/{id}', 'serviceItemController@update');

//User
Route::get('/User','HomeController@user');
Route::get('/UserCreate','HomeController@usercreate');
Route::get('/UserEdit/{id}', 'HomeController@useredit');
Route::get('/UserDeactivate/{id}', 'HomeController@userdeac');
Route::get('/UserReactivate/{id}', 'HomeController@userreac');
Route::get('/UserSoft', 'HomeController@usersoft');

Route::post('/UserStore','HomeController@userstore');
Route::post('/UserUpdate/{id}','HomeController@userupdate');

//Customer Feedback
Route::get('/Feedback','FeedbackController@index');
Route::get('/FeedbackCreate','FeedbackController@create');
Route::get('/FeedbackUpdate/{id}', 'FeedbackController@edit');
Route::get('/FeedbackDeactivate/{id}', 'FeedbackController@destroy');
Route::get('/FeedbackSoft', 'FeedbackController@soft');
Route::get('/FeedbackReactivate/{id}', 'FeedbackController@reactivate');
Route::get('/FeedbackPost/{id}', 'FeedbackController@publish');
Route::get('/FeedbackUnpublish/{id}', 'FeedbackController@unpublish');

Route::post('FeedbackStore', 'FeedbackController@store');
Route::post('FeedbackEdit/{id}', 'FeedbackController@update');

//Advisory
Route::post('/AdvisoryUpdate/{id}','AdvisoryController@update');
Route::post('/AdvisoryNew','AdvisoryController@store');

//Review
Route::get('/Review', 'FeedbackController@indexReview');



//SNS
Route::post('/SNSUpdate/{id}','SNSController@update');
Route::post('/SNSNew','SNSController@store');

//FAQs
Route::get('/FAQCreate','FAQController@create');
Route::get('/FAQUpdate/{id}', 'FAQController@edit');
Route::get('/FAQDeactivate/{id}', 'FAQController@destroy');
Route::get('/FAQSoft', 'FAQController@soft');
Route::get('/FAQReactivate/{id}', 'FAQController@reactivate');

Route::post('/FAQStore','FAQController@store');
Route::post('/FAQEdit/{id}', 'FAQController@update');

//Packages
Route::get('/Package','PackageController@index');
Route::get('/PackageCreate','PackageController@create');
Route::get('/PackageUpdate/{id}','PackageController@edit');
Route::get('/PackageDeactivate/{id}', 'PackageController@destroy');
Route::get('/PackageSoft', 'PackageController@soft');
Route::get('/PackageReactivate/{id}', 'PackageController@reactivate');

Route::post('/PackageStore','PackageController@store');
Route::post('/PackageEdit/{id}','PackageController@update');

//order
Route::get('/orders','OrderController@index');
Route::get('/OrderView/{id}','OrderController@edit');
Route::get('/OrderUpdate/{id}','OrderController@statusupdate');

//Attribute
Route::get('/Attribute','itemAttributesController@index');
Route::get('/AttributeCreate','itemAttributesController@create');
Route::get('/AttributeUpdate/{id}','itemAttributesController@edit');
Route::get('/AttributeDeactivate/{id}', 'itemAttributesController@destroy');
Route::get('/AttributeSoft', 'itemAttributesController@soft');
Route::get('/AttributeReactivate/{id}', 'itemAttributesController@reactivate');

Route::post('/AttributeStore','itemAttributesController@store');
Route::post('/AttributeEdit/{id}','itemAttributesController@update');
});

Route::group(['middleware' => 'App\Http\Middleware\contributorMiddleware'], function () {



//post
Route::get('/Post','postController@index');
Route::get('/PostCreate','postController@create');
Route::get('/PostDraft/{id}','postController@publish');
Route::get('/PostUnpub/{id}','postController@unpublish');
Route::get('/PostEdit/{id}','postController@edit');
Route::get('/PostDeactivate/{id}', 'postController@destroy');
Route::get('/PostSoft','postController@soft');
Route::get('/PostReactivate/{id}', 'postController@reactivate');
Route::get('/PostShow/{id}', 'postController@show');
Route::get('/PostType/{id}','postController@type');
Route::get('/PostSub/{id}','postController@sub');

Route::post('/PostStore', 'postController@store');
Route::post('/PostUpdate/{id}', 'postController@update');

//Inquiry
Route::get('/InquiryRead','InquiryController@read');
Route::get('/InquiryView/{id}','InquiryController@show');
Route::post('/InquiryUpdate/{id}','InquiryController@update');
});
