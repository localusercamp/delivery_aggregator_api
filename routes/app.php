<?php

Route::middleware('authenticated')->group(function() {
  Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@list');
    Route::post('/', 'ProductController@create');
    Route::post('/{id}/change-poster', 'ProductController@changePoster')->where('id', '[0-9]+');
  });
  Route::prefix('tag')->group(function() {
    Route::get('/', 'TagController@list');
  });
  Route::prefix('utils')->group(function() {
    Route::post('get-companies-by-inn', 'UtilsController@getCompaniesByInn');
  });
});
