<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    
    public function profile()
    {
        return view('Content.profile');
    }

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
        $user = auth()->user();

    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'address' => 'nullable|string|max:255',
        'password' => 'nullable|string|min:6',
    ]);

    $user->name = $request->username;
    $user->email = $request->email;
    $user->address = $request->address;

    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }

    // Hapus user (opsional)
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted.');
    }
}
