<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TenantController extends Controller
{



    // public function pesanan()
    // {
    //     $tenantUserId = Auth::user()->id;

    //     $transactions = Transaction::where('status', 0)
    //         ->whereHas('detailtransaction.product', function ($query) use ($tenantUserId) {
    //             $query->whereHas('user', function ($query) use ($tenantUserId) {
    //                 $query->where('id', $tenantUserId);
    //             });
    //         })
    //         ->get();

    //     $orderCount = $transactions->count();
    //     return view('tenant.pesanan', compact('transactions', 'orderCount'));
    // }


    // public function riwayatPesanan()
    // {
    //     $tenantUserId = Auth::user()->id;

    //     $transactions = Transaction::whereHas('detailtransaction.product', function ($query) use ($tenantUserId) {
    //         $query->whereHas('user', function ($query) use ($tenantUserId) {
    //             $query->where('id', $tenantUserId);
    //         });
    //     })
    //     ->get();

    //     return view('tenant.riwayat-pesanan', compact('transactions'));
    // }

    public function pesanan()
    {
        $tenantUserId = Auth::user()->id;
    
        $transactions = Transaction::where('status', 0)
            ->whereHas('detailtransaction.product.user', function ($query) use ($tenantUserId) {
                $query->where('id', $tenantUserId);
            })
            ->get();
    
        return view('tenant.pesanan', compact('transactions'));
    }
    
    
    public function riwayatPesanan()
    {
        $tenantUserId = Auth::user()->id;
    
        $transactions = Transaction::whereHas('detailtransaction.product.user', function ($query) use ($tenantUserId) {
            $query->where('id', $tenantUserId);
        })
        ->get();
    
        return view('tenant.riwayat-pesanan', compact('transactions'));
    }
    













    public function serahkanPesanan($id)
    {
        $transaction = Transaction::findOrFail($id);

        if ($transaction->status == 1) {
            // Ubah status pesanan menjadi Belum Diserahkan
            $transaction->status = 2;
            $transaction->save();

            return redirect('/tenant/riwayat-pesanan')->with('success', 'Pesanan telah diserahkan.');
        }

        return redirect('/tenant/riwayat-pesanan')->with('error', 'Gagal menyerahkan pesanan.');
    }
}
