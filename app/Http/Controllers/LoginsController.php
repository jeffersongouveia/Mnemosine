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
        $login = new Login();

        $fields = [
            'id_vault', 'icon', 'name', 'username', 'password', 'strength',
            'ip', 'dns', 'equipment', 'favorite', 'deleted'
        ];

        foreach($fields as $field) {
            $login[$field] = $request[$field];
        }

        $login->save();
    }

    public function update(Request $request) {
        $login = Login::find($request->id);

        $fields = [
            'id_vault', 'favorite', 'name', 'username', 'password', 'strength',
            'ip', 'dns', 'equipment'
        ];

        foreach($fields as $field) {
            if(isset($request[$field])) {
                $login[$field] = $request[$field];
            }
        }

        $login->save();
    }

    public function destroy($id) {
        $login = Login::find($id);

        $login->deleted = true;

        $login->save();
    }
}
