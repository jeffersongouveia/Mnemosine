<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Radius;

class RadiusController extends Controller
{
	public function index() {
		return Radius::all();
	}

    public function store(Request $request) {
        $radius = new Radius();

        $radius->id = 2;
        $radius->username = $request['username'];
        $radius->value = $request['password'];
        $radius->attribute = 'User-Password';
        $radius->op = ':=';

        $radius->save();
    }
}
