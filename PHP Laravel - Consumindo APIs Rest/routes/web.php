<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/github/buscar', 'GithubController@buscar');

Route::get('/curso/list', 'CursoController@list');
Route::get('/curso/show', 'CursoController@show');
Route::get('/curso/create', 'CursoController@create');
Route::get('/curso/update', 'CursoController@update');
Route::get('/curso/delete', 'CursoController@delete');