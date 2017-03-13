<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mnemosine\User;
use Mnemosine\UserGroup;
use Mnemosine\UserVault;

class UsersController extends Controller
{
    public function index() {
        return User::where('deleted', false)->get();
    }

    public function store(Request $request) {
        $user = new User();

        $fields = ['name', 'email', 'password'];

        foreach($fields as $field) {
            $user[$field] = $request[$field];
        }

        $user->deleted = false;

        $user->save();

        $user_inserted = User::where('email', $user->email)->get();
        $id_user = $user_inserted[0]->id;
        $this->storeGroups($request, $id_user);
        $this->storeVaults($request, $id_user);
    }

    private function storeGroups(Request $request, $id_user) {
        $user_groups = new UserGroup();

        $user_groups->id_user = $id_user;
        foreach($request->groups as $group) {
            $user_groups->id_group = $group;
        }

        $user_groups->deleted = false;
        $user_groups->save();
    }

    private function storeVaults(Request $request, $id_user) {
        $user_vaults = new UserVault();

        $user_vaults->id_user = $id_user;
        foreach($request->vaults as $vault) {
            $user_vaults->id_vault = $vault;
        }

        $user_vaults->deleted = false;
        $user_vaults->save();
    }
}
