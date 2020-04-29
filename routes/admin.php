<?php
              Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

              Config::set('auth.defines','admin');
              Route::get('login', 'AdminAuth@login');
              Route::get('register', 'AdminAuth@register');
              Route::get('forgot/password', 'AdminAuth@forgot_password');
              Route::post('forgot/password', 'AdminAuth@forgot_password_post');
              Route::get('reset/password/{token}', 'AdminAuth@reset_password');
              Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');
              Route::any('logout', 'AdminAuth@logout');
              Route::post('login', 'AdminAuth@dologin');

              Route::group(['middleware' => 'admin:admin'],function (){


                // start Admin Route
                  // Route::any('admin/custmedit', 'AdminController@custom_edit');
                  // Route::any('admin/custmedit', 'AdminController@test');
                  Route::delete('admin/destroy/all', 'AdminController@multi_delete');
                  Route::resource('admin', 'AdminController');
                  Route::post('admin/create_quick', 'AdminController@quick_store');

                // start users Route
                  // Route::any('users/custmedit', 'UsersController@custom_edit');
                  // Route::any('users/custmedit', 'UsersController@test');
                  Route::delete('users/destroy/all', 'UsersController@multi_delete');
                  Route::resource('users', 'UsersController');
                  Route::post('users/create_quick', 'UsersController@quick_store');

                  // start users Route
                  Route::delete('countreis/destroy/all', 'CountreisController@multi_delete');
                  Route::resource('countreis', 'CountreisController');
                  Route::post('countreis/create_quick', 'CountreisController@quick_store');


                  // start departments Route
                  Route::delete('departments/destroy/all', 'DepartmentsController@multi_delete');
                  Route::resource('departments', 'DepartmentsController');
                  Route::post('departments/create_quick', 'DepartmentsController@quick_store');


                  // start Trademarks Route
                  Route::delete('trademarks/destroy/all', 'TrademarksController@multi_delete');
                  Route::resource('trademarks', 'TrademarksController');
                  Route::post('trademarks/create_quick', 'TrademarksController@quick_store');

                  // start Manufacts Route
                  Route::delete('manufacts/destroy/all', 'ManufactsController@multi_delete');
                  Route::resource('manufacts', 'ManufactsController');
                  Route::post('manufacts/create_quick', 'ManufactsController@quick_store');
                  Route::get('manufacts/{id}/show','ManufactsController@show');


                  // start Shipping Route
                  Route::delete('shipping/destroy/all', 'ShippingController@multi_delete');
                  Route::resource('shipping', 'ShippingController');
                  Route::post('shipping/create_quick', 'ShippingController@quick_store');

                 // start Shipping Route
                  Route::delete('mall/destroy/all', 'MallController@multi_delete');
                  Route::resource('mall', 'MallController');
                  Route::post('mall/create_quick', 'MallController@quick_store');


                 // start Shipping Route
                  Route::delete('color/destroy/all', 'ColorController@multi_delete');
                  Route::resource('color', 'ColorController');
                  Route::post('color/create_quick', 'ColorController@quick_store');

                 // start Shipping weight
                  Route::delete('weights/destroy/all', 'WeightController@multi_delete');
                  Route::resource('weights', 'WeightController');
                  Route::post('weights/create_quick', 'WeightController@quick_store');

                 // start Shipping size
                  Route::delete('sizes/destroy/all', 'SizeController@multi_delete');
                  Route::resource('sizes', 'SizeController');
                  Route::post('sizes/create_quick', 'SizeController@quick_store');
                  Route::get('sizes/{id}/show','SizeController@show');



        // start Shipping size
                  Route::delete('flavors/destroy/all', 'FlavorController@multi_delete');
                  Route::resource('flavors', 'FlavorController');
                  Route::post('flavors/create_quick', 'FlavorController@quick_store');
                  Route::get('flavors/{id}/show','FlavorController@show');




                  // start setting Route
                  Route::get('settings', 'SettingsController@setting');
                  Route::post('settings', 'SettingsController@setting_save');
                  Route::post('settings', 'SettingsController@setting_save_in_page');


                  // // start frontends Route
                  Route::get('frontends',  'FrontendsController@frontend');
                  Route::post('frontends', 'FrontendsController@frontend_save');
                  Route::post('frontends', 'FrontendsController@frontend_save_in_page');

                  // start users Route
                  Route::delete('sliders/destroy/all', 'SlidersController@multi_delete');
                  Route::resource('sliders', 'SlidersController');
                  Route::post('sliders/create_quick', 'SlidersController@quick_store');





                  // start products Route
                  Route::delete('products/destroy/all', 'ProductsController@multi_delete');
                  Route::resource('products', 'ProductsController');
                  Route::post('upload/image/{pid}', 'ProductsController@upload_file');
                  Route::post('delete/image', 'ProductsController@delete_file');


                   Route::post('update/image/{pid}', 'ProductsController@update_Product_image');
                  Route::post('delete/product/image/{pid}', 'ProductsController@delete_main_image');
                  Route::post('load/wight/size', 'ProductsController@prepare_wight_size');











                  Route::get('/', function () {return view('back.home');});

                  

          });//middleware


          

                  Route::get('lang/{lang}',function($lang){
                      session()->has('lang')?session()->forget('lang'):'';
                      $lang == 'ar'? session()->put('lang','ar'):session()->put('lang','en');
                      return back();
                  });

      });

