<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KelolaBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil input pencarian, kategori, dan kondisi
        $cari = $request->cari;
        $kategori = $request->kategori;
        $kondisi = $request->kondisi;

        // Bangun query untuk Barang
        $query = Barang::query()->orderBy('created_at', 'desc');

        // Filter berdasarkan pencarian
        if ($cari) {
            $query->where('nama_barang', 'like', "%$cari%");
        }

        // Filter berdasarkan kategori
        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }

        // Filter berdasarkan kondisi
        if ($kondisi) {
            $query->where('kondisi', $kondisi);
        }

        // Eksekusi query dengan paginasi
        $barang = $query->paginate(10);

        // Ambil semua kategori untuk dropdown
        $kategori = Kategori::all();

        // Return view dengan data yang dibutuhkan
        return view('barang.index', compact('barang', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_barang' => 'required|string',
                'gambar' => 'nullable|image|mimes:png,jpg,jpeg|max:10240',
                'jumlah' => 'required',
                'kategori_id' => 'required|exists:kategori,id',
                'kondisi' => 'required',
            ],
            [
                'nama_barang.required' => 'Nama barang tidak boleh kosong',
                'jumlah.required' => 'Jumlah Barang Tidak Boleh Kosong',
                'kategori_id.required' => 'Kategori harus di Pilih Salah Satu',
                'kategori_id.exists' => 'Kategori harus di Pilih Salah Satu',
                'kondisi.required' => 'Kondisi Barang Tidak Boleh Kosong',
                'gambar.max' => 'Ukuran Maksimal Gambar 10MB',
            ]
        );

        // menyimpan foto
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('upload/gambar', $nama_file, 'public');
        }

        // simpan data ke database
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->gambar = $filePath;
        $barang->jumlah = $request->jumlah;
        $barang->kategori_id = $request->kategori_id;
        $barang->kondisi = $request->kondisi;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data Berhasil di Simpan');
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
        // mencari data barang berdasarkan id
        $barang = Barang::find($id);
        $kategori = Kategori::all();

        // memastikan data barang ditemukan
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Data Barang Tidak Ditem
            kan');
        }

        return view('barang.edit', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_barang' => 'nullable|string',
                'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
                'jumlah' => 'nullable|integer',
                'kategori_id' => 'nullable|integer',
                'kondisi' => 'nullable|string',
            ]
        );

        // Ambil data barang yang akan diupdate
        $barang = Barang::find($id);

        // Pastikan data barang ditemukan
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Data Barang Tidak Ditemukan');
        }

        // Update data barang
        $barang->nama_barang = $request->input('nama_barang', $barang->nama_barang);
        $barang->jumlah = $request->input('jumlah', $barang->jumlah);
        $barang->kategori_id = $request->input('kategori_id', $barang->kategori_id);
        $barang->kondisi = $request->input('kondisi', $barang->kondisi);

        // Handle file gambar jika diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar && file_exists(storage_path('app/public/' . $barang->gambar))) {
                unlink(storage_path('app/public/' . $barang->gambar));
            }

            // Simpan gambar baru
            $file = $request->file('gambar');
            $nama_file = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('upload/gambar', $nama_file, 'public');
            $barang->gambar = $path;
        }

        // Simpan perubahan
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // ambil data barang yang akan di hapus
        $barang = Barang::find($id);

        // pastikan data barang di temukan
        if (!$barang) {
            return redirect()->route('barang.index')->with('error', 'Data Barang Tidak Ditem
            ukan');
        }
        // dd($barang);
        // menghapus data
        $barang->delete();

        // hapus gambar dari database
        if ($barang->gambar) {
            Storage::disk('public')->delete($barang->gambar);
        }

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Dihapus');
    }
}
