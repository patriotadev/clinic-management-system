<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function getLoginPage()
    {
        return view('auth.login');
    }

    public function postLoginForm(Request $request)
    {

        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username tidak boleh kosong.',
                'password.required' => 'Password tidak boleh kosong.'
            ]
        );

        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session([
                    'hasLogin' => true,
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'user_username' => $user->username,
                    'user_roles' => $user->roles
                ]);
                return redirect('/');
            } else {
                $request->session()->flash('password_fail', 'Password salah.');
                return redirect('/login');
            }
        } else {
            $request->session()->flash('username_fail', 'Username salah.');
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}
