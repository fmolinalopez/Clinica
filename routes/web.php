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
Route::post('/medicos/validar', 'MedicosController@validar')->middleware('auth');
Route::get('/{nombreMedico}/clinicas', 'MedicosController@clinicas')->name('clinicas');

Route::get('/user/{userName}', 'UsersController@index')->name('userInfo');

Route::get('/profile', 'ProfilesController@profile')->name('profile')->middleware('auth');
Route::get('/profile/edit', 'ProfilesController@edit')->middleware('auth');
Route::get('/profile/personal', 'ProfilesController@edit')->name('profile.personal')->middleware('auth');
Route::get('/profile/account', 'ProfilesController@edit')->name('profile.account')->middleware('auth');
Route::get('/profile/avatar', 'ProfilesController@edit')->name('profile.avatar')->middleware('auth');
Route::get('/profile/additional', 'ProfilesController@edit')->name('profile.additional')->middleware('auth');

Route::get('/citas', 'CitasController@showCitasUsuario')->middleware('auth');

Route::get('/cita', 'CitasController@crearCita')->name('askCita')->middleware('auth');
Route::post('/cita/crear', 'CitasController@store')->name('crearCita')->middleware('auth');
Route::post('/cita/validar', 'CitasController@validar')->name('validarCita')->middleware('auth');
Route::get('/obtenerMedicosClinica/{idClinica}', 'CitasController@obtenerMedicosClinica');
//Route::get('/obtenerCitasMedico/{idMedico}', 'CitasController@obtenerCitasMedico');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
