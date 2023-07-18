<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function index()
    {
        // Mendapatkan semua data pengguna (users) dari database
        $users = User::all();
        // Mengirimkan data pengguna ke view 'users.index'
        return view('users.index', compact('users'));
    }




    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required',
            'address' => 'nullable',
            'phone' => 'nullable',
            'role' => 'required|in:Administrator,Tenant,Member',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('images');
        }

        $user = User::create($validatedData);

        return redirect()->route('users.create')->with('success', 'User created successfully.');
    }


    public function edit($id)
    {

        $users = User::find($id);
        // Atau gunakan metode lain untuk mengambil data pengguna berdasarkan ID

        return view('users.edit', compact('users'));
    }

 


    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'password' => 'nullable',
            'address' => 'required',
            'phone' => 'required',
            'role' => 'required|in:Administrator,Tenant,Member',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        if ($request->file('image')) {
            // Hapus gambar lama (jika ada)
            if ($user->image) {
                Storage::delete($user->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images');
            $validatedData['image'] = $imagePath;
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect()->route('users.index', $user->id)->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Jika terdapat gambar pengguna:
        if ($user->image) {
            // Hapus gambar dari folder public/images
            Storage::delete($user->image);
        }

        // Hapus data pengguna dari database
        User::destroy($user->id);

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
