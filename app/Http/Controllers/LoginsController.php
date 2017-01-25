<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Login;

class LoginsController extends Controller
{
    public function index() {
        $logins = Login::all();

        return $logins;
    }
}
