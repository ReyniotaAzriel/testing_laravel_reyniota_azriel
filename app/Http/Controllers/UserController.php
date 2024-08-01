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
}
