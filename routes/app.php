<?php

Route::middleware('authenticated')->group(function() {
  Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@list');
  });
  Route::prefix('tag')->group(function() {
    Route::get('/', 'TagController@list');
  });
});
