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

        $radius->username = $request['username'];
        $radius->value = $request['value'];
        $radius->attribute = 'User-Password';
        $radius->op = ':=';

        $radius->save();
    }

    public function update(Request $request) {
	    $radius = Radius::find($request->id);

	    $radius->username = $request->username;
	    $radius->value = $request->value;
	    $radius->attribute = 'User-Password';
	    $radius->op = ':=';

	    $radius->save();
    }

    public function destroy($id) {
	    $radius = Radius::find($id);
	    $radius->delete();
    }
}
