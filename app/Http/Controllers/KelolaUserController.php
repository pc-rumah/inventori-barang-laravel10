<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::with('roles')->get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'role_user' => 'required|in:admin,staff',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->nama_user,
            'email' => strtolower(str_replace(' ', '', $request->nama_user)) . '@gmail.com', // Generate email (sesuaikan jika perlu)
            'password' => Hash::make('12345678'), // Default password (ganti jika perlu)
        ]);

        // Assign role menggunakan Spatie
        $user->assignRole($request->role_user);

        return redirect()->route('user.index')->with('success', 'Berhasil Menambah User');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        // Jika user tidak ditemukan, redirect dengan pesan error
        if (!$user) {
            return redirect()->route('user.index')->with('error', 'User tidak ditemukan.');
        }

        if ($user->hasRole('admin') && $user->email === 'admin@example.com') {
            return redirect()->route('user.index')->with('error', 'Tidak dapat menghapus admin utama.');
        }

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Berhasil Menghapus User');
    }
}
