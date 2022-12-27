<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Koneksi ke Model Barang
use App\Models\Barang;

class BarangController extends Controller
{
    public function index () 
    {
        $barangs = Barang::all();
        return view('semua_barang', compact('barangs'));
    }

    public function create()
    {
        return view('tambah_barang');
    }

    public function store (request $request)
    {
        // proses memasukkan data barang (insert) ke database
        Barang::create([
            'nama_barang'  => $request->nama_barang,
            'harga'        => $request->harga,
        ]);

        return redirect('/barang')->with(['added' => true]);
    }
}
