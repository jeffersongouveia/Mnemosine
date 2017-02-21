<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Login;

class LoginsController extends Controller
{
    public function index() {
        return Login::all();
    }

    public function favorites() {
        return Login::where('favorite', true)->get();
    }
}
