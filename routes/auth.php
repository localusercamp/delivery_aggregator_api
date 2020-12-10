<?php

Route::middleware('guest')->group(function() {
  Route::post('seller/signup', 'AuthController@signupSeller');
  Route::post('seller/signin', 'AuthController@signinSeller');
  Route::post('buyer/signup',  'AuthController@signupBuyer');
  Route::post('buyer/signin',  'AuthController@signinBuyer');
});

Route::middleware('authenticated')->group(function() {
  Route::post('signout', 'AuthController@signout');
  Route::post('refresh', 'AuthController@refresh');
});
