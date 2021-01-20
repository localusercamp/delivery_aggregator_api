<?php

Route::middleware('authenticated')->group(function() {
  Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@list');
  });
});
