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

Route::get('/', 'PagesController@home')->name('/');
Route::get('/obtenerPaginaMedicos/', 'PagesController@obtenerPaginaMedicos');

Route::get('/medicos/create', 'MedicosController@create')->name('addMedico')->middleware('auth');
Route::post('/medicos/create', 'MedicosController@store')->name('storeMedico')->middleware('auth');
Route::get('/{nombreMedico}/clinicas', 'MedicosController@clinicas')->name('clinicas');

Route::get('/user/{userName}', 'UsersController@index')->name('userInfo');

Route::get('/profile', 'ProfilesController@profile')->name('profile')->middleware('auth');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
