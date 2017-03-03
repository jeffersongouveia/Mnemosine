<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Vault;

class VaultsController extends Controller
{
    public function index() {
        return Vault::all();
    }
}
