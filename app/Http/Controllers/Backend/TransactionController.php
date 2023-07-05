<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('transaction');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     //cek apakah user sudah atau tidak
    //     $user = Auth::user();
    //     if(!$user){
    //        return redirect('/');
    //     }
    //     //cek apakah ada transaction dengan status 0 pada user yang bersangkutan
    //     // $tran = Transaction::where(['user_id'=>$user->id, 'status'=>0])->first();
    //     // if(!$tran){
    //     //     $tran = new Transaction();
    //     //     $tran->user_id = $user->id;
    //     //     $tran->total_bayar = 0;
    //     //     $tran->status = 0;
            
    //     //     $tran->save();
    //     // }

    //     $tran = Transaction::firstOrCreate(
    //         ['user_id' => $user->id, 'status'=>0],
    //         ['total_bayar'=> 0],
    //     );
    //     $trandetail =DetailTransaction::create([
    //         'transaction_id' => $tran->id,
    //         'product_id' => 1,
    //         'user_id' => $user->id,
    //         'qty' => 5,
    //         'total_harga' => 5000,
    //     ],[
    //         'transaction_id' => $tran->id,
    //         'product_id' => 1,
    //         'user_id' => $user->id,
    //         'qty' => 5,
    //         'total_harga' => 5000,
    //     ]);

    //     return $tran;

    //     //input data transaction dengan status 0

    //     //input data detail transaction sesuai dengan transaction


    // }

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
        //
    }
}
