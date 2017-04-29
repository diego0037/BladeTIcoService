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
    return view('PaginasWeb.busqueda', ['name' => session('name')]);
});

Route::get('/user/activation/{token}',
'UserController@userActivation');


Route::get('registro', function(){
      return view('PaginasWeb.registro');
});

Route::get('login', function(){
      return view('PaginasWeb.login');
});

Route::get('busqueda', function(){
      return view('PaginasWeb.busqueda');
});

Route::get('colaboradores', function(){
      return view('PaginasWeb.colaboradores');
});

Route::get('servicios', function(){
      return view('PaginasWeb.servicios');
});

Route::get('admin', function(){
      return view('PaginasWeb.admin');
});

Route::get('updateProfile', function(){
      return view('PaginasWeb.actualizarPerfil');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
