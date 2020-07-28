<?php

use Illuminate\Support\Facades\Route;

// OPCIONES INDEX
Route::get('/', function () {
    return view('index');
});

// OPCIONES FLORA
Route::get('/flora', 'FloraController@index');

// OPCIONES FAUNA
Route::get('/fauna', 'FaunaController@index');

// OPCIONES SUELO
Route::get('/suelo', 'SueloController@index');

// OPCIONES AIRE
Route::get('/aire', 'AireController@index');

// OPCIONES FORESTALES
Route::get('/forestales', 'ForestalesController@index');

// OPCIONES SOCIAL
Route::get('/social', 'SocialController@index');

// OPCIONES USUARIOS
Route::get('/usuarios', 'UsuariosController@index');

// OPCIONES PERFIL Y MENÚ
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/perfil', 'DashboardController@perfil');
