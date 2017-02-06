<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
  return view('home');
});

Route::get('/api/vaults', function() {
    return Mnemosine\Vault::all();
});

Route::resource('/api/logins', 'LoginsController');
