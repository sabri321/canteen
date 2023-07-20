<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $data['username'],
            'password' => $data['password']
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'Administrator') {
                return redirect('/dashboard/Administrator')->with('success', 'Anda berhasil login.');
            } elseif ($user->role == 'Tenant') {
                return redirect('/dashboard/Tenant')->with('success', 'Anda berhasil login.');
            } elseif ($user->role == 'Member') {
                return redirect('/')->with('success', 'Anda berhasil login.');
            }
        }

        // Jika username atau password salah, redirect ke halaman login dengan pesan error
        return redirect()->back()->withErrors('Username dan password yang dimasukkan salah')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
