<?php

Route::get('/', function() {
  return view('home');
});

Route::get('/api/vaults', function() {
    return Mnemosine\Vault::all();
});

Route::resource('/api/logins', 'LoginsController');
Route::get('/api/favorites', 'LoginsController@favorites');

Route::resource('/api/notes', 'NotesController');
