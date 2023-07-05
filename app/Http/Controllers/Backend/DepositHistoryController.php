<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepositHistory;
use App\Models\User;
use Illuminate\Http\Request;

class DepositHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposit = DepositHistory::all();
        // Mengirimkan data pengguna ke view 'users.index'
        return view('deposit.index', compact('deposit'));
    }


    public function create()
    {
        $deposit = DepositHistory::all();
        $users = User::all();
        return view('deposit.create', compact('deposit', 'users'));
    }


    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'nominal' => 'required|integer',
            // 'status' => 'required|integer',
            'deskripsi' => 'required|string'
        ]);

        // Dapatkan data pengguna berdasarkan ID
        $user = User::findOrFail($request->user_id);

        // Dapatkan saldo awal pengguna
        $saldoAwal = $user->deposit;

        // Dapatkan nominal deposit baru dari input
        $nominalBaru = $request->nominal;

        // Hitung saldo baru
        $saldoBaru = $saldoAwal + $nominalBaru;

        // Simpan data deposit baru ke dalam tabel deposit_histories
        DepositHistory::create([
            'user_id' => $user->id,
            'nominal' => $nominalBaru,
            // 'status' => $request->status,
            'status' => 1,
            'deskripsi' => $request->deskripsi
        ]);

        // Update saldo pengguna
        $user->deposit = $saldoBaru;
        $user->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Saldo berhasil ditambahkan.');
    }



    public function show($id)
    {
        $deposit = DepositHistory::where('user_id', $id)->get();
        $totalDeposit = $deposit->sum('nominal');
    
        return view('deposit.show', compact('deposit', 'totalDeposit'));
    }
    



    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
