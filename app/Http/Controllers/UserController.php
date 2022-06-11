<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $data = [
            'users' => User::all()
        ];

        return view('users.index', $data);
    }

    public function getAddUserPage()
    {
        return view('users.add');
    }

    public function postAddUserForm(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'roles' => 'required',
                'username' => 'required|max:24|unique:users,name',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Nama pengguna tidak boleh kosong.',
                'roles.required' => 'Peran pengguna harus dipilih.',
                'username.required' => 'Username pengguna tidak boleh kosong.',
                'username.max' => 'Username pengguna tidak boleh lebih dari 24 karakter.',
                'username.unique' => 'Username tidak tersedia.',
                'password.required' => 'Password pengguna tidak boleh kosong.',
                'password.min' => 'Password pengguna tidak boleh kurang dari 6 karakter.'
            ]
        );

        $data = [
            'name' => $request->name,
            'roles' => $request->roles,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'plain_password' => $request->password,
            'created_by' => session('user_name')
        ];

        User::create($data);
        $request->session()->flash('add_user_success', 'Pengguna baru berhasil ditambahkan.');
        return redirect('/users');
    }

    public function getEditUserPage($id)
    {
        $data = [
            'user' => User::where('id', $id)->first()
        ];

        return view('users.edit', $data);
    }

    public function postEditUserForm($id, Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'roles' => 'required',
                'username' => 'required|max:24|unique:users,name',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Nama pengguna tidak boleh kosong.',
                'roles.required' => 'Peran pengguna harus dipilih.',
                'username.required' => 'Username pengguna tidak boleh kosong.',
                'username.max' => 'Username pengguna tidak boleh lebih dari 24 karakter.',
                'username.unique' => 'Username tidak tersedia.',
                'password.required' => 'Password pengguna tidak boleh kosong.',
                'password.min' => 'Password pengguna tidak boleh kurang dari 6 karakter.'
            ]
        );

        $data = [
            'name' => $request->name,
            'roles' => $request->roles,
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'plain_password' => $request->password
        ];

        User::where('id', $id)->update($data);
        $request->session()->flash('edit_user_success', 'Data pengguna berhasil diubah.');
        return redirect('/users');
    }

    public function postDeleteUserForm($id)
    {
        User::where('id', $id)->delete();
    }

    public function add()
    {
    }
}
