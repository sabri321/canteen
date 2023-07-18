<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepositHistory;
use App\Models\DetailTransaction;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{
    public function index($id)
    {
        $product = Product::where('id', $id)->first();
        return view('transaction.index', compact('product'));
    }



    public function pesan(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        // Validasi apakah melebihi qty (stok)
        if ($request->jumlah_pesan > $product->qty) {
            return redirect('transaction/' . $id)->with('error', 'Jumlah pesanan melebihi stok yang tersedia.');
        }

        $user = auth()->user();

        // Cek validasi pesanan
        $transaction = Transaction::where('user_id', $user->id)->where('status', 0)->first();

        // Simpan ke database transaction jika belum ada transaksi
        if (empty($transaction)) {
            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->status = 0;
            $transaction->total_bayar = 0;
            $transaction->save();
        }

        // Simpan ke database detail transaction
        $detailTransaction = DetailTransaction::where('product_id', $product->id)
            ->where('transaction_id', $transaction->id)
            ->first();

        if (empty($detailTransaction)) {
            $detailTransaction = new DetailTransaction();
            $detailTransaction->product_id = $product->id;
            $detailTransaction->transaction_id = $transaction->id;
            $detailTransaction->user_id = $product->user_id; // Assign user_id dari product
            $detailTransaction->qty = $request->jumlah_pesan;
            $detailTransaction->total_harga = $product->price * $request->jumlah_pesan;
            $detailTransaction->save();
        } else {
            $detailTransaction->qty += $request->jumlah_pesan;
            $detailTransaction->total_harga += $product->price * $request->jumlah_pesan;
            $detailTransaction->save();
        }

        // Jumlah total
        $transaction->total_bayar += $product->price * $request->jumlah_pesan;
        $transaction->save();

        return redirect('check-out')->with('pesan', 'Pesanan berhasil ditambahkan ke keranjang.');
    }


    public function check_out()
    {
        $user = auth()->user();
        $transaction = Transaction::where('user_id', $user->id)->where('status', 0)->first();
        $detail_transactions = [];

        if (!empty($transaction)) {
            $detail_transactions = DetailTransaction::where('transaction_id', $transaction->id)->get();

            // Periksa saldo member
            $totalBayar = $transaction->total_bayar;
            if ($user->deposit < $totalBayar) {
                return redirect('transaction.check_out')->back()->with('error', 'Saldo Anda tidak cukup untuk melakukan pembayaran.');
            }
        }
        // Tampilkan SweetAlert berhasil

        return view('transaction.check_out', compact('transaction', 'detail_transactions'));
    }



    public function delete($id)
    {
        $detailTransaction = DetailTransaction::find($id);

        if (!$detailTransaction) {
            return redirect('check-out')->with('error', 'Detail transaction not found.');
        }

        $transaction = Transaction::find($detailTransaction->transaction_id);

        if (!$transaction) {
            return redirect('check-out')->with('error', 'Transaction not found.');
        }

        $transaction->total_bayar -= $detailTransaction->total_harga;
        $transaction->save();

        $detailTransaction->delete();

        return redirect('check-out')->with('success', 'Detail transaction has been deleted successfully.');
    }


    public function konfirmasi()
    {
        $user = Auth::user();
    
        $transaction = Transaction::where('user_id', $user->id)->where('status', 0)->first();
        $transaction_id = $transaction->id;
        $transaction->status = 1;
        $transaction->update();
    
        $detail_transactions = DetailTransaction::where('transaction_id', $transaction_id)->get();
    
        // Potong saldo member
        $user->deposit -= $transaction->total_bayar;
        $user->save();
    
        // Tambahkan saldo ke user tenant dan buat histori deposit
        foreach ($detail_transactions as $detail_transaction) {
            $product = Product::where('id', $detail_transaction->product_id)->first();
            $tenantUser = User::where('role', 'Tenant')->where('id', $product->user_id)->first();
    
            if (!empty($tenantUser)) {
                $total_harga = $detail_transaction->total_harga;
    
                // Perhitungan pembagian saldo berdasarkan harga produk
                $saldo_per_tenant = $total_harga / $detail_transaction->qty;
    
                $tenantUser->deposit += $saldo_per_tenant;
                $tenantUser->save();
    
                // Mengurangi stok atau qty produk
                $product->qty -= $detail_transaction->qty;
                $product->save();
    
                // Buat histori deposit untuk tenant
                DepositHistory::create([
                    'user_id' => $tenantUser->id,
                    'nominal' => $saldo_per_tenant,
                    'status' => 1,
                    'deskripsi' => 'Saldo Masuk (Pembayaran Member)'
                ]);
            }
        }
    
        // Buat histori deposit untuk member
        DepositHistory::create([
            'user_id' => $user->id,
            'nominal' => $transaction->total_bayar,
            'status' => 0,
            'deskripsi' => 'Saldo Terpotong (Pembayaran Product)'
        ]);
    
        return redirect('history/' . $transaction_id);
    }
    

}
