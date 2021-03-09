<?php

Route::middleware('authenticated')->group(function() {
  Route::prefix('company')->group(function() {
    Route::post('/', 'CompanyController@create');
  });
  Route::prefix('product')->group(function() {
    Route::get('/', 'ProductController@list');
    Route::post('/', 'ProductController@create');
    Route::post('/{id}/change-poster', 'ProductController@changePoster')->where('id', '[0-9]+');
  });
  Route::prefix('user')->group(function() {
    Route::get('/sync', 'UserController@sync');
  });
  Route::prefix('tag')->group(function() {
    Route::get('/', 'TagController@list');
  });
  Route::prefix('territory')->group(function() {
    Route::get('/', 'TerritoryController@list');
  });
  Route::prefix('company-type')->group(function() {
    Route::get('/', 'CompanyTypeController@list');
  });
  Route::prefix('utils')->group(function() {
    Route::post('get-companies-by-inn', 'UtilsController@getCompaniesByInn');
  });
});
