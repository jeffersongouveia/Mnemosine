<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Note;

class NotesController extends Controller
{
    public function index() {
        return Note::where('deleted', false)->get();
    }

    public function store(Request $request) {
        $note = new Note($request->all());
        $note->save();
    }

    public function update(Request $request) {
        $note = Note::find($request->id);
        $note->update($request->all());
    }

    public function destroy($id) {
        $note = Note::find($id);
        $note->deleted = true;
        $note->save();
    }
}
