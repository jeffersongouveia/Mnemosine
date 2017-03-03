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
        $note = new Note();

        $fields = [
            'id_vault', 'icon', 'name', 'note', 'favorite', 'deleted'
        ];

        foreach($fields as $field) {
            $note[$field] = $request[$field];
        }

        $note->save();
    }

    public function update(Request $request) {
        $note = Note::find($request->id);

        $fields = [
            'id_vault', 'icon', 'name', 'note', 'favorite'
        ];

        foreach($fields as $field) {
            if(isset($request[$field])) {
                $note[$field] = $request[$field];
            }
        }

        $note->save();
    }

    public function destroy($id) {
        $note = Note::find($id);

        $note->deleted = true;

        $note->save();
    }
}
