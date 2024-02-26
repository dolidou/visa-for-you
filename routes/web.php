<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeRdvController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layout');
});
// Route::get('/rdv', function () {
//     return view('visa.rdv');
// });
// Route::get('/listerdv', function () {
//     return view('visa.listerdv');
// });

Route::resource('rdv', DemandeRdvController::class)->names('demanderdv');
Route::get('/get-visa-types/{pays_id}', 'App\Http\Controllers\DemandeRdvController@getVisaTypes')->name('get.visa.types');
Route::get('/check-rdv-exists', 'App\Http\Controllers\DemandeRdvController@checkRdvExists')->name('check.rdv.exists');
Route::get('/get-disponibilites/{type_visa_id}/{pays_id}', 'App\Http\Controllers\DemandeRdvController@getDisponibilites')->name('get.disponibilites');
Route::get('/listerdv', 'App\Http\Controllers\ListeRdvController@index');


