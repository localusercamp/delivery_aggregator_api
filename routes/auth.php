<?php

Route::middleware('guest')->group(function() {
  Route::prefix('provider')->group(function() {
    Route::post('signup', 'AuthController@signupProvider');
    Route::post('signin', 'AuthController@signinProvider');
  });
  Route::prefix('client')->group(function() {
    Route::post('signup',  'AuthController@signupClient');
    Route::post('signin',  'AuthController@signinClient');
  });
});

Route::middleware('authenticated')->group(function() {
  Route::post('signout', 'AuthController@signout');
  Route::post('refresh', 'AuthController@refresh');
});
