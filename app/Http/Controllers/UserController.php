<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Hanya admin yang boleh akses (pastikan route pakai middleware 'role:admin')
    
    // Menampilkan semua user
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan form edit user (role)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Menyimpan perubahan role user
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,staff'
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'User role updated.');
    }

    // Hapus user (opsional)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
