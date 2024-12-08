<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori,nama_kategori',
            ],
            [
                'nama_kategori.required' => 'Nama Kategori tidak boleh kosong',
                'nama_kategori.unique' => 'Nama Kategori sudah ada',
            ]
        );

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kategori' => 'required|unique:kategori,nama_kategori,' . $id,
            ]
        );

        $kategori = Kategori::find($id);

        // pastikan data kategori ditemukan
        if (!$kategori) {
            return redirect()->route('kategori.index')->with('error', 'Data tidak ditemukan');
        }

        $kategori->nama_kategori = $request->input('nama_kategori');
        $kategori->save();
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Kategori::find($id);
        // dd($kategori);
        // hapus data
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Dihapus');
    }
}
