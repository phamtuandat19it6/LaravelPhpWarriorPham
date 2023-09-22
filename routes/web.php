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
//frontend
Route::get('/','HomeController@index');
Route::get('/trang-chu','HomeController@index');
Route::post('tim-kiem','HomeController@search');

//Danh mục sản phẩm trang chủ
Route::get('/danh-muc-san-pham/{category_id}','CategoryProduct@show_category_home');
//Thương hiệu sản phẩm
Route::get('/thuong-hieu-san-pham/{brand_id}','CategoryProduct@show_brand_home');
// chi-tiet-san-pham
Route::get('/chi-tiet-san-pham/{product_id}','ProductController@show_details');
// Thêm vào giỏ hàng
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');
Route::post('/update-pro-detail','CartController@update_pro_detail');
// Route::post('/add-cart-ajax','CartController@save_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/gio-hang','CartController@gio_hang');
Route::get('/delete-to-cart/{rowId}','CartController@delete_to_cart');
Route::post('/update-cart-quantity','CartController@update_cart_quantity');
Route::post('/update-cart','CartController@update_cart');
Route::get('/del-product/{session_id}','CartController@delete_product');
Route::get('/del-order/{order_id}','CartController@del_order');
Route::get('/del-all-product','CartController@delete_all_product');
//checkout
Route::get('/login-checkout','CheckouController@login_checkout');
Route::get('/del-fee','CheckouController@del_fee');
Route::get('/logout-checkout','CheckouController@logout_checkout');
Route::post('/add-customer','CheckouController@add_customer');
Route::post('/order-place','CheckouController@order_place');
Route::post('/login-customer','CheckouController@login_customer');
Route::get('/checkouts','CheckouController@checkouts');
Route::post('/save-checkout-customer','CheckouController@save_checkout_customer');
Route::get('/payment','CheckouController@payment');
Route::post('/select-delivery-home','CheckouController@select_delivery_home');
Route::post('/caculate-fee','CheckouController@caculate_fee');
Route::post('/confirm-order','CheckouController@confirm_order');

// Send Mail
Route::get('send-email','HomeController@send_email');

//manage-order
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');

Route::get('/view-shipping/{orderId}','CheckouController@view_shipping');

//backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');

// category-product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');

Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');


//product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');

Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');

//coupon
Route::post('/check-coupon','CartController@check_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');

Route::get('/list-coupon','CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
// brand
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//Login facebook
Route::get('/login-facebooks','AdminController@login_facebook');
Route::get('/admin/callback','AdminController@callback_facebook');
//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-feeship','DeliveryController@select_feeship');
Route::post('/update-delivery','DeliveryController@update_delivery');
