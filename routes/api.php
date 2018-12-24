<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
  Route::group(['prefix' => 'auth'], function () {
  Route::post('login', 'AuthController@login');
  Route::post('signup', 'AuthController@signup');

  Route::group(['middleware' => 'auth:api'], function() {
  // Route::get('logout', 'AuthController@logout');
  //Route::get('user', 'AuthController@user');
  });
  });
 */






/* * ****CLIENT*** */
Route::resource('paginarest', 'PaginarestController');

/* * ****AUTH*** */
Route::resource('sitioweb', 'SitiowebController', ['only' => ['index', 'show']]);
Route::resource('direcciones', 'DireccionesController');
Route::resource('pagina', 'PaginaController');
Route::resource('contenido', 'ContenidoController');
Route::resource('informaciones', 'InformacionesController');


