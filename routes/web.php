<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemandeRdvController;
use App\Http\Controllers\ProfileController;

// Routes publiques
Route::get('/', function () {
    return view('dashboard');
});

Route::resource('rdv', DemandeRdvController::class)->names('demanderdv');
Route::get('/get-visa-types/{pays_id}', 'App\Http\Controllers\DemandeRdvController@getVisaTypes')->name('get.visa.types');
Route::get('/check-rdv-exists', 'App\Http\Controllers\DemandeRdvController@checkRdvExists')->name('check.rdv.exists');
Route::get('/get-disponibilites/{type_visa_id}/{pays_id}', 'App\Http\Controllers\DemandeRdvController@getDisponibilites')->name('get.disponibilites');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/listerdv', 'App\Http\Controllers\ListeRdvController@index');
    Route::resource('/listerdv', 'App\Http\Controllers\ListeRdvController')->names('listerdv');
    Route::get('/listerdv/download/{id}', 'App\Http\Controllers\ListeRdvController@downloadFile')->name('listerdv.download');
    Route::resource('pays', 'App\Http\Controllers\PaysController');
    Route::resource('typevisas', 'App\Http\Controllers\TypeVisaController')->names('type_visa');
    Route::resource('pays', 'App\Http\Controllers\PaysController')->names('pays');
    Route::post('/pays/{pays}/ajouter-type-visa', 'App\Http\Controllers\PaysController@ajouterTypeVisa')->name('pays.ajouter-type-visa');
    

    // Autres routes protégées...
});

Auth::routes();

