<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Login;

class LoginsController extends Controller
{
    public function index() {
        return Login::where('deleted', false)->get();
    }

    public function show($id) {
        return Login::find($id);
    }

    public function store(Request $request) {
        $login = new Login($request->all());
        $login->save();
    }

    public function update(Request $request) {
        $login = Login::find($request->id);
        $login->update($request->all());
    }

    public function destroy($id) {
        $login = Login::find($id);
        $login->deleted = true;
        $login->save();
    }
}
