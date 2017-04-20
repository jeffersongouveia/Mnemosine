<?php

namespace Mnemosine\Http\Controllers;

use Mnemosine\Equipment;
use Mnemosine\Http\Requests\EquipmentRequest;

class EquipmentsController extends Controller
{
    public function index() {
        return Equipment::all();
    }

    public function store(EquipmentRequest $request) {
        // TODO: trocar a forma de captura do $request dos outros Controllers pela dessa abaixo
        $equipment = new Equipment($request->all());
        $equipment->save();
    }

    public function update(EquipmentRequest $request) {
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
