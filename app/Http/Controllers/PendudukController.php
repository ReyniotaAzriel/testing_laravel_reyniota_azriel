<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $response = Penduduk::all();

        $penduduk = $response;

        return view('penduduk.content', compact('penduduk'));
    }

    public function createPendudukPage()
    {
        // get user untuk opsi user id
        $response = User::all();

        $user = $response;

        return view('penduduk.crud.create', compact('user'));
    }

    public function createPendudukRequest(Request $request)
    {
        $request->validate([
            'user_id' => 'required|unique:penduduks',
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
            'photo' => 'required'
        ]);

        $photoName = time() . '.' . $request->photo->extension();
        $request->photo->move(public_path('img/penduduk'), $photoName);

        Penduduk::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => date_format(date_create($request->date_of_birth), "Y-m-d"),
            'address' => $request->address,
            'photo' => 'img/penduduk/' . $photoName
        ]);

        return redirect()->route('penduduk')->with('success', 'Berhasil menambah penduduk baru!');
    }

    public function editPendudukPage($id)
    {
        $penduduk = Penduduk::find($id);

        return view('penduduk.crud.edit', compact('penduduk'));
    }

    public function editPendudukRequest($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required|date',
            'address' => 'required',
        ]);

        $penduduk = Penduduk::find($id);
        $penduduk->name = $request->name;
        $penduduk->gender = $request->gender;
        $penduduk->place_of_birth = $request->place_of_birth;
        $penduduk->date_of_birth = $request->date_of_birth;
        $penduduk->address = $request->address;

        $penduduk->save();

        return redirect()->route('penduduk')->with('success', 'Berhasil mengubah data penduduk!');
    }

    public function deletePendudukRequest($id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->delete();

        return redirect()->route('penduduk')->with('success', 'Berhasil menghapus penduduk!');
    }
}
