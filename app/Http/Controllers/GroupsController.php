<?php

namespace Mnemosine\Http\Controllers;

use Illuminate\Http\Request;
use Mnemosine\Group;
use Mnemosine\GroupVaults;
use Mnemosine\UserGroup;
use Mnemosine\UserVault;

class GroupsController extends Controller
{
    public function index() {
        return Group::where('deleted', false)->get();
    }

    public function store(Request $request) {
        $group = new Group();

        $group->name = $request->name;
        $group->deleted = false;

        $group->save();

        $this->storeGroupVaults($request->vaults, $group->id);
        $this->storeUserGroups($request->users, $group->id);
    }

    private function storeGroupVaults($vaults, $id_group) {
        foreach($vaults as $vault) {
            $group_vaults = new GroupVaults();

            $group_vaults->id_group = $id_group;
            $group_vaults->id_vault = $vault;
            $group_vaults->deleted = false;

            $group_vaults->save();
        }
    }

    private function storeUserGroups($users, $id_group) {
        foreach($users as $user) {
            $user_group = new UserGroup();

            $user_group->id_user = $user;
            $user_group->id_group = $id_group;
            $user_group->deleted = false;

            $user_group->save();
        }
    }
}
