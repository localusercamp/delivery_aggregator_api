<?php

Route::middleware('guest')->group(function() {
  Route::post('provider/signup', 'AuthController@signupProvider');
  Route::post('provider/signin', 'AuthController@signinProvider');
  Route::post('client/signup',  'AuthController@signupClient');
  Route::post('client/signin',  'AuthController@signinClient');
});

Route::middleware('authenticated')->group(function() {
  Route::post('signout', 'AuthController@signout');
  Route::post('refresh', 'AuthController@refresh');
});
