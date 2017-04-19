<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Equipment;

class EquipmentsController extends Controller
{
    public function index() {
        return Equipment::all();
    }

    public function store(Request $request) {
        $equipment = new Equipment();

        $fields = [
            'nasname', 'shortname', 'type', 'ports', 'secret', 'description'
        ];

        foreach($fields as $field) {
            $equipment[$field] = $request[$field];
        }

        $equipment->save();
    }

    public function update(Request $request) {
        $equipment = Equipment::find($request->id);

        $fields = [
            'nasname', 'shortname', 'type', 'ports', 'secret', 'description'
        ];

        foreach($fields as $field) {
            if(isset($request[$field])) {
                $equipment[$field] = $request[$field];
            }
        }

        $equipment->save();
    }

    public function destroy($id) {
        $equipment = Equipment::find($id);

        $equipment->delete();
    }
}
