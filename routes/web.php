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

Route::get('/', function () {
    $ws = new \App\Website();
    $slides = $ws->getSlide();
    $noticias = $ws->getContents('noticia');
    $casos = $ws->getContents('casos');
    $comunicados = $ws->getContents('comunicado');
    return view('website.index', compact('slides', 'noticias', 'casos', 'comunicados'));
});

Route::get('sitioweb', 'SitiowebsiteController@index');

/* PAGINA */
Route::resource('informacion', 'InformacionController');
Route::resource('galeria', 'GaleriaController');
Route::resource('multimedia', 'MultimediaController');
Route::resource('slider', 'SliderController');
Route::resource('pagina', 'PaginaController');
Route::resource('informaciones', 'InformacionesController');
Route::resource('direcciones', 'DireccionesController');
Route::resource('infografia', 'InfografiaController');
Route::resource('galery', 'GaleryController');

/* LOGIN */
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/home', 'HomeController@index')->name('home');

/*************************David Rutas*****************************/
Route::get('page/{p1?}', 'WebsiteController@index');
Route::get('detail/{id}', 'WebsiteController@detail');
Route::get('faq', 'WebsiteController@faq');
Route::get('noticias', 'WebsiteController@noticias');
Route::get('comunicados', 'WebsiteController@comunicados');
