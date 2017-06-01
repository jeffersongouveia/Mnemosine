<?php

namespace Mnemosine\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Mnemosine\Group;
use Mnemosine\User;
use Mnemosine\UserGroup;
use Mnemosine\UserVault;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function index() {
        return User::where('deleted', false)->get();
    }

    public function store(Request $request) {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);

        $user->save();

        $this->storeUserGroups($request->groups, $user->id);
        $this->storeUserVaults($request->vaults, $user->id);
    }

    // TODO: alterar a função pra permitir atualizar apenas o username
    public function update(Request $request) {
        $validator = $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $response['success'] = false;

        if($validator->fails()) {
            $response['errors'] = $validator->errors();
        } else {
            $user = User::find($request->id);

            if(Hash::check($request->actual_password, $user->password)) {
                $user->forceFill([
                    'password' => bcrypt($request->new_password),
                    'remember_token' => Str::random(60),
                ])->save();

                $response['success'] = true;
                $response['message'] = 'Senha atualizada com sucesso!';
            } else {
                $response['errors'] = [
                    'actual_password' => 'Ops, essa senha está errada.'
                ];
            }
        }

        return response()->json($response);
    }

    public function destroy($id) {
        $user = User::find($id);

        DB::transaction(function() use ($id) {
            DB::table('user_logins')->where('id_user', $id)->delete();
            DB::table('user_notes')->where('id_user', $id)->delete();
            DB::table('user_vaults')->where('id_user', $id)->delete();
            DB::table('user_groups')->where('id_user', $id)->delete();
        });

        $user->delete();
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

    protected function rules() {
        return [
            'actual_password' => 'required',
            'new_password' => 'required|confirmed|min:8'
        ];
    }

    protected function validationErrorMessages() {
        return [
            'required' => 'Este campo é obrigatório!',
            'confirmed' => 'A sua nova senha e a confirmação da sua nova senha não são iguais.',
            'min' => 'A sua senha deve ter no mínimo :min caracteres'
        ];
    }

    public function validate(Request $request, array $rules, array $messages = [], array $customAttributes = []) {
        return $this->getValidationFactory()->make($request->all(), $rules, $messages, $customAttributes);
    }
}
