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
        $equipment = new Equipment($request->all());
        $equipment->save();
    }

    public function update(Request $request) {
        $equipment = Equipment::find($request->id);
        $equipment->update($request->all());
    }

    public function destroy($id) {
        $equipment = Equipment::find($id);
        $equipment->delete();
    }
}
