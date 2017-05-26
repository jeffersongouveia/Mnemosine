<?php

namespace Mnemosine\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Mnemosine\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Mnemosine\User;

class ResetPasswordController extends Controller
{
    use RedirectsUsers;

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

//    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reset(Request $request)
    {
        $request['token'] = $request['_token'];
        unset($request['_token']);

        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        $actual_password = $request['actual_password'];
        $password = Auth::user()->password;
        if(Hash::check($actual_password, $password)) {
            $this->resetPassword(Auth::user()->id, $request['new_password']);
            return back();
        } else {
            return back()->with('error', 'Ops, parece que você digitou sua atual senha incorretamente.');
        }
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'actual_password' => 'required',
            'new_password' => 'required|confirmed|min:1'
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [
            'required' => 'Este campo é obrigatório!',
            'confirmed' => 'A sua nova senha e a confirmação da sua nova senha não são iguais.',
            'min' => 'A sua senha deve ter no mínimo :min caracteres'
        ];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only(
            'token', 'username', 'actual_password', 'new_password', 'new_password_confirmation'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  integer  $user_id
     * @param  string  $new_password
     * @return void
     */
    protected function resetPassword($user_id, $new_password)
    {
        $user = User::find($user_id);
        $user->forceFill([
            'password' => bcrypt($new_password),
            'remember_token' => Str::random(60),
        ])->save();

        $this->guard()->login($user);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
