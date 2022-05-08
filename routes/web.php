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
    return view('welcome');
});

// Modifica la lingua in fase di esecuzione
Route::get('/changeLanguage/{locale}', function ($locale) {
    App::setLocale($locale);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //Route per la Home page

Route::get('/search', 'SearchController@index')->name('search'); //Route per la Search page

Route::get('/collection', 'ContenutiController@index')->name('collection'); //Route per la Collection page

Route::post('/crea_collection', 'RaccolteController@store')->name('crea_collection'); //Route per la creazione di una nuova playlist

Route::post('/cerca', 'SearchController@cerca')->name('cerca'); //Route per la funzione di Ricerca

Route::get('/playlist', 'RaccolteController@playlist')->name('playlist'); // Route per accedere all'interno della playlist

Route::post('/add', 'SearchController@add')->name('add'); // Route per aggiungere i brani

Route::get('/cerca', 'SearchController@index')->name('cerca'); // Route per eseguire la funzione index (== visualizzare la Search page)

Route::get('/delete', 'ContenutiController@delete')->name('delete'); // Route per eliminare un elemento dalla playlist

