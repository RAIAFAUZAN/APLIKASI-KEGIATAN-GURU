<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Hash;
use App\Models\Authentication\User;

class AdministrationController extends Controller
{
    // tampilkan form login
    public function index()
    {
        // $users = User::all(); // ambil semua user
        $users = User::where('is_active', 1)->get();

        return view('administration.index', compact('users')); // kirim ke view    
    }

    public function create()
    {
        return view('administration.create');
    }

    // proses insert
    public function insert(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required|string',
        ]);

        User::create([
            'user_name'     => $request->nama,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password), // default password
            'is_active' => 1,
        ]);

        return redirect()->route('administration')
                        ->with('success', 'Data berhasil disimpan!');
    }

    public function edit($id)
    {
         $user = User::findOrFail($id);

        // kirim ke view edit.blade.php
        return view('administration.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, // biar email unik tapi boleh sama dengan email user ini
            'role'  => 'required|string',
        ]);

        $user = User::findOrFail($id);
        $user->user_name  = $request->nama;
        $user->email = $request->email;
        $user->role  = $request->role;
        if ($request->filled('password')) {
           $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('administration')
                        ->with('success', 'Data berhasil diperbarui!');
    }
    // logout
      public function delete($id)
    {
         $user = User::findOrFail($id);
         $user->is_active = 0;
         $user->deleted_at = now();
         $user->save();

        return redirect()->route('administration')
                        ->with('success', 'Data berhasil diperbarui!');
    }
}
