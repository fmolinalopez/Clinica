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

Route::get('/{nombreMedico}/clinicas', 'MedicosController@clinicas')->name('clinicas');

Route::get('/user/{userName}', 'UsersController@index')->name('userInfo');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/{user}/clinicas/elegir', 'ClinicasController@elegirClinicas');
    Route::post('/{user}/clinicas/elegir', 'ClinicasController@sincronizarClinicas');


    Route::get('/profile', 'ProfilesController@profile')->name('profile');
    Route::get('/profile/edit', 'ProfilesController@edit')->name('profile.edit');
    Route::patch('/profile/edit', 'ProfilesController@update');
    Route::get('/profile/personal', 'ProfilesController@datosPersonales');
    Route::get('/profile/account', 'ProfilesController@datosCuenta');
    Route::get('/profile/avatar', 'ProfilesController@datosAvatar');
    Route::get('/profile/additional', 'ProfilesController@datosAdicionales');
    Route::delete('/profile/delete', 'ProfilesController@destroy');

    Route::get('/citas', 'CitasController@showCitasUsuario');

    Route::get('/clinica/{clinica}', 'ClinicasController@info');

    Route::get('/conversation/{user}', 'UsersController@conversation');
    Route::post('/conversation/{user}', 'UsersController@crearConversation');
    Route::get('/conversations', 'UsersController@showConversations');
    Route::get('/conversation/{conversation}/messages', 'UsersController@showMessages');
    Route::post('/message/validar', 'UsersController@validateMessage');

    Route::get('/cita', 'CitasController@crearCita')->name('askCita')->middleware('notMedico');
    Route::post('/cita/crear', 'CitasController@store')->name('crearCita');
    Route::post('/cita/validar', 'CitasController@validar')->name('validarCita');
    Route::get('/obtenerMedicosClinica/{idClinica}', 'CitasController@obtenerMedicosClinica');
    Route::delete('/cita/delete/{cita}', 'CitasController@destroy')->name('cita.delete');
});

Auth::routes();
Route::post('/register/validar', 'UsersController@validarRegistroAsync');

//Route::get('/home', 'HomeController@index')->name('home');
