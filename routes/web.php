<?php

use App\Http\Controllers\AziendeController;
use App\Http\Controllers\LoginController;
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

Route::get('/benvenuto', function () {
    return view('benvenuto');
})->name('benvenuto');

Route::get('/registrazione', "IscrizioneController@registrazione")->name('registrazione');
Route::post('/registrazione', 'IscrizioneController@crea');

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@autenticazione');
Route::get('/utenti', 'LoginController@utenti');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@home')->name('home');
Route::get('/home/notizie','HomeController@notizie');

Route::get('/eventi', 'EventiController@eventi')->name('eventi');
Route::get('/eventi/prossimi','EventiController@prossimi_eventi');
Route::get('/eventi/aggiungi/{nome}/{data}','EventiController@aggiungi');

Route::get('/aziende', 'AziendeController@aziende')->name('aziende');
Route::get('/aziende/carica', 'AziendeController@carica_aziende');
Route::get('/aziende/analizza/{azienda}', 'AziendeController@analisi');

Route::get('/personale', 'PersonaleController@personale')->name('profilo');
Route::get('/personale/{azienda}', 'PersonaleController@aggiungi');
Route::get('/preferiti', 'PersonaleController@preferiti');
Route::get('/prenotazioni', 'PersonaleController@prenotazioni');
Route::get('/prenotazioni/elimina/{value}', 'PersonaleController@elimina_prenotazione');
Route::get('/preferiti/elimina/{value}', 'PersonaleController@elimina_preferito');

Route::get('/modelli', 'ModelliController@modelli')->name('modelli');
Route::get('/modelli/get', 'ModelliController@getModelli');
Route::get('/modelli/inserimento/{codice}/{data}/{nome}/{sesso}/{nazione}/{azienda}/{ingaggio}','ModelliController@inserisci');
Route::get('/modelli/cerca/{sesso}/{manager}/{nazione?}','ModelliController@cerca');
