<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = 'Tenant';
        $user = User::where('role', $role)->get();
        return view('tenant/index', [
            'tenant' => $user
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data = User::select('role');
        $roles = User::pluck('role');
        return view('/tenant/create',[
            'tenant' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'deposit' => 'required',
        'role' => 'required',
        'image' => 'required',
    ]);

    // Jika validasi berhasil, lakukan penyimpanan data ke database
    // Misalnya, menggunakan model Tenant:
    $tenant = new User();
    $tenant->name = $request->input('name');
    $tenant->username = $request->input('username');
    $tenant->password = $request->input('password');
    $tenant->address = $request->input('address');
    $tenant->phone = $request->input('phone');
    $tenant->deposit = $request->input('deposit');
    $tenant->role = $request->input('role');
    // Lakukan proses penyimpanan gambar jika perlu
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Lakukan proses upload gambar ke direktori yang diinginkan
        // Misalnya, simpan di direktori 'public/images'
        $path = $image->store('public/images');
        // Ambil hanya nama file-nya
        $imageName = basename($path);
        $tenant->image = $imageName;
    }
    // Simpan data tenant ke database
    $tenant->save();

    // Lakukan pengembalian atau redirect ke halaman yang diinginkan
    return redirect()->route('tenant.create')->with('success', 'Tenant berhasil ditambahkan.');
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
    public function destroy($id)
    {
       $tenant = User::findOrFail($id);
       $tenant->delete();
        return redirect("tenant");
    }
}
