<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TenantController extends Controller
{

   public function pesanan()
   {
      $transactions = Transaction::where('status', 'Sudah Dibayar')->get();

      $orderCount = $transactions->count();
      return view('tenant.pesanan', compact('transactions', 'orderCount'));
   }

   public function riwayatPesanan()

   {
      $transactions = Transaction::get();

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
