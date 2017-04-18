<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Equipment;

class EquipmentsController extends Controller
{
    public function index() {
        return Equipment::all();
    }
}
