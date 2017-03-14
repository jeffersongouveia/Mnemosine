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

        $this->storeUserGroups($request->groups, $user->id);
        $this->storeUserVaults($request->vaults, $user->id);
    }

    private function storeUserGroups($groups, $id) {
        foreach($groups as $group) {
            $user_groups = new UserGroup();

            $user_groups->id_user = $id;
            $user_groups->id_group = $group;
            $user_groups->deleted = false;

            $user_groups->save();
        }
    }

    private function storeUserVaults($vaults, $id) {
        foreach($vaults as $vault) {
            $user_vaults = new UserVault();

            $user_vaults->id_user = $id;
            $user_vaults->id_vault = $vault;
            $user_vaults->deleted = false;

            $user_vaults->save();
        }
    }
}
