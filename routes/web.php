<?php

use Mnemosine\Login;
use Mnemosine\Note;

Auth::routes();

Route::get('/', 'HomeController@index');

// TODO: blindar as api de todos os acessos que não sejam do próprio sistema
Route::get('/api/all', function() {
    $logins = Login::where('deleted', false)->get();
    $notes = Note::where('deleted', false)->get();

    return array($logins, $notes);
});

Route::get('/api/favorites', function() {
    $logins = Login::where('favorite', true)->get();
    $notes = Note::where('favorite', true)->get();

    return array($logins, $notes);
});

Route::resource('/api/vaults', 'VaultsController');
Route::resource('/api/equipments', 'EquipmentsController');
Route::resource('/api/logins', 'LoginsController');
Route::resource('/api/notes', 'NotesController');

Route::resource('/api/radius', 'RadiusController');
Route::resource('/api/users', 'UsersController');
Route::resource('/api/groups', 'GroupsController');