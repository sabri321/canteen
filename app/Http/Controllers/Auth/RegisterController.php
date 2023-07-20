<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth/register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'password' => 'required'
        ]);
    
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect('/login')->with('success', 'Register Berhasil. Silahkan Login');
    }
    
}
