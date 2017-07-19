<?php

namespace Mnemosine\Http\Controllers;

use http\Url;
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
        $this->restartFreeradius();
    }

    public function update(Request $request) {
        $equipment = Equipment::find($request->id);
        $equipment->update($request->all());
        $this->restartFreeradius();
    }

    public function destroy($id) {
        $equipment = Equipment::find($id);
        $equipment->delete();
        $this->restartFreeradius();
    }

    private function restartFreeradius() {
        exec('service freeradius restart');
    }
}
