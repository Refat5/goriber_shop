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
/*
user Route*/

Route::get('/','Frontend\PagesController@index')->name('index');
Route::get('/contact','Frontend\PagesController@contact')->name('contact');
Route::get('/about','Frontend\PagesController@about')->name('about');
Route::get('/search','Frontend\PagesController@search')->name('search');


Route::group(['prefix' => 'product'], function(){

//product Route
Route::get('/product','Frontend\ProductController@product')->name('product');
Route::get('/product/{p_slug}','Frontend\ProductController@show')->name('product.show');

//categories
Route::get('/categoris','Frontend\CeategoriesController@index')->name('categoris.index');
Route::get('/category/{id}','Frontend\CeategoriesController@show')->name('categoris.show');
});

//User Route /{token}
Route::group(['prefix' => 'user'],function(){
	
Route::get('/token/{token}','Frontend\VerificationController@verify')->name('user.verification');
Route::get('/dashboard','Frontend\UserController@dashboard')->name('user.dashboard');
Route::get('/profile','Frontend\UserController@profile')->name('user.profile');
Route::post('/profile/update','Frontend\UserController@profileUpdate')->name('user.profile.update');

});

// //Cart Route 
// Route::group(['prefix' => 'cart'],function(){
	

// Route::get('/','API\CartController@index')->name('carts');
// Route::post('/store','API\CartController@store')->name('carts.store');
// Route::post('/update/{id}','API\CartController@update')->name('carts.update');
// Route::post('/delete/{id}','API\CartController@destroy')->name('carts.delete');


// });


//Wishlist Route 
Route::group(['prefix' => 'wishlist'],function(){
	

Route::get('/','Frontend\WishlistController@index')->name('wishlist');
Route::post('/store','Frontend\WishlistController@store')->name('wishlist.store');

Route::post('/delete/{id}','Frontend\WishlistController@destroy')->name('wishlist.delete');


});
//Checkout Route 
Route::group(['prefix' => 'checkout'],function(){
	

Route::get('/','Frontend\CheckoutController@index')->name('checkout');
Route::post('/store','Frontend\CheckoutController@store')->name('checkout.store');



});







/*
 Admin Route*/
Route::group(['prefix' => 'admin'], function(){

Route::get('/','Backend\AdminPageController@index')->name('admin.index');

//Auth Route
Route::get('/log','Auth\admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/log/sabmit','Auth\admin\LoginController@log')->name('admin.sabmit.login');
Route::post('/logout/sabmit','Auth\admin\LoginController@logout')->name('admin.logout');

//admin profile

Route::get('/dashboard','Backend\AdminController@adashboard')->name('admin.dashboard');
Route::get('/profile','Backend\AdminController@aprofile')->name('admin.profile');
Route::post('/profile/update','Backend\AdminController@aprofileUpdate')->name('admin.profile.update');

//password email send Route
Route::get('/password/reset','Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/email','Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

//password reset  Route
Route::get('/password/reset/{token}','Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset','Auth\admin\ResetPasswordController@reset')->name('admin.password.update');





/*Product Route*/
Route::group(['prefix' => 'product'],function(){

Route::get('/create','Backend\AdminProductController@create')->name('admin.product.create');
Route::post('/store','Backend\AdminProductController@store')->name('admin.product.store');
Route::get('/list','Backend\AdminProductController@list')->name('admin.product.list');
Route::get('/edit/{id}','Backend\AdminProductController@edit')->name('admin.product.edit');
Route::post('/edit/{id}','Backend\AdminProductController@update')->name('admin.product.update');
Route::post('/delete/{id}','Backend\AdminProductController@delete')->name('admin.product.delete');

});


/*Category Route*/
Route::group(['prefix' => 'category'],function(){

Route::get('/create','Backend\CategoryController@create')->name('admin.category.create');
Route::post('/store','Backend\CategoryController@store')->name('admin.category.store');
Route::get('/list','Backend\CategoryController@list')->name('admin.category.list');
Route::get('/edit/{id}','Backend\CategoryController@edit')->name('admin.category.edit');
Route::post('/edit/{id}','Backend\CategoryController@update')->name('admin.category.update');
Route::post('/delete/{id}','Backend\CategoryController@delete')->name('admin.category.delete');


});



/*Order Route*/
Route::group(['prefix' => 'order'],function(){

Route::get('/list','Backend\OrderController@list')->name('admin.order.list');
Route::get('/view/{id}','Backend\OrderController@view')->name('admin.order.view');
Route::post('/delete/{id}','Backend\OrderController@delete')->name('admin.order.delete');
Route::post('/completed/{id}','Backend\OrderController@completed')->name('admin.order.completed');

Route::post('/paid/{id}','Backend\OrderController@paid')->name('admin.order.paid');

Route::post('/charge/{id}','Backend\OrderController@charge')->name('admin.order.charge');

Route::get('/invoice/{id}','Backend\OrderController@invoice')->name('admin.order.invoice');


});


/*Slider Route*/



Route::group(['prefix' => 'slider'],function(){


Route::post('/store','Backend\SliderController@store')->name('admin.slider.store');
Route::get('/list','Backend\SliderController@list')->name('admin.slider.list');

Route::post('/edit/{id}','Backend\SliderController@update')->name('admin.slider.update');
Route::post('/delete/{id}','Backend\SliderController@delete')->name('admin.slider.delete');


});


/*Brands Route*/

Route::group(['prefix' => 'brands'],function(){

Route::get('/create','Backend\BrandController@create')->name('admin.brands.create');
Route::post('/store','Backend\BrandController@store')->name('admin.brands.store');
Route::get('/list','Backend\BrandController@list')->name('admin.brands.list');
Route::get('/edit/{id}','Backend\BrandController@edit')->name('admin.brands.edit');
Route::post('/edit/{id}','Backend\BrandController@update')->name('admin.brands.update');
Route::post('/delete/{id}','Backend\BrandController@delete')->name('admin.brands.delete');


});

/*District Route*/

Route::group(['prefix' => 'district'],function(){


Route::post('/store','Backend\DistrictController@store')->name('admin.district.store');
Route::get('/list','Backend\DistrictController@list')->name('admin.district.list');

Route::post('/edit/{id}','Backend\DistrictController@update')->name('admin.district.update');
Route::post('/delete/{id}','Backend\DistrictController@delete')->name('admin.district.delete');


});

/*Division Route*/

Route::group(['prefix' => 'division'],function(){


Route::post('/store','Backend\DivisionController@store')->name('admin.division.store');
Route::get('/list','Backend\DivisionController@list')->name('admin.division.list');
Route::post('/edit/{id}','Backend\DivisionController@update')->name('admin.division.update');
Route::post('/delete/{id}','Backend\DivisionController@delete')->name('admin.division.delete');


}); 









}); 

Route::get('localization/{locale}','Backend\AdminController@local');







Auth::routes();

Route::get('/','Frontend\PagesController@index')->name('index');

/*API Route
*/
Route::get('get-distric/{id}',function($id)
{
	return json_encode( App\District::where('division_id',$id)->get());

});
