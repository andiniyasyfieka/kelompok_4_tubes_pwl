<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); // Mencari user berdasarkan ID
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        // Update data user
        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        $user->delete(); // Hapus user

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
