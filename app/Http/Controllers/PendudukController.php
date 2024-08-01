<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function index()
    {
        $response = Penduduk::all();

        $penduduk = $response;
        // dd($penduduk->toArray());
        return view('penduduk.content', compact('penduduk'));
    }
}
