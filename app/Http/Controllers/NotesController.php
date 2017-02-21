<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Note;

class NotesController extends Controller
{
    public function index() {
        return Note::all();
    }
}
