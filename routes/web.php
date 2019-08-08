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
    return view('home');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/Evaluacion-Desempeño', 'FichaEvaluacion@Evaluacion_view')->name('EvaluacionView');
Route::get('/Evaluacion-Rspa', 'FichaEvaluacion@Evaluacion_rspa')->name('Evaluacionrspa');
Route::post('/Evaluacion-Desempeño', 'FichaEvaluacion@Store')->name('StoreEvaluacion');
//Route::post('/Evaluacion-Rstd', 'FichaEvaluacion@Evaluacion_rstd')->name('ResultadoEvaluacion');
// Auth::routes();
Route::get('/Reporte-Evalua', 'FichaEvaluacion@Evaluacion_reporte')->name('ReporteEvaluacion');
// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

