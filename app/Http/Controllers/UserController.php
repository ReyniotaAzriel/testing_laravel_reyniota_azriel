<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $response = User::all();

        $user = $response;

        return view('user.content', compact('user'));
    }

    public function createUserPage()
    {
        return view('user.crud.create');
    }

    public function createUserRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user')->with('success', 'Berhasil menambah user baru!');
    }

    public function editUserPage($id)
    {
        $user = User::find($id);

        return view('user.crud.edit', compact('user'));
    }

    public function editUserRequest($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::find($id);
        $user->name = $request->name;

        // Jika password baru diisi, maka update password
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'Berhasil mengubah data user!');
    }

    public function deleteUserRequest($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user')->with('success', 'Berhasil menghapus user!');
    }
}
