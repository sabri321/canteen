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


    // public function pesan(Request $request, $id)
    // {
    //     $product = Product::where('id', $id)->first();

    //     //validasi apakah melebihi qty (stok)
    //     if ($request->jumlah_pesan > $product->qty) {
    //         return redirect('transaction/' . $id);
    //     }

    //     //cek validasi pesanan
    //     $cek_transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();


    //     //simpan ke database transaction
    //     if (empty($cek_transaction)) {
    //         $transaction = new Transaction;
    //         $transaction->user_id = Auth::user()->id;
    //         $transaction->status = 0;
    //         $transaction->total_bayar = 0;
    //         $transaction->save();
    //     }

    //     //simpan ke database detail transaction
    //     $transaction_new = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();

    //     //dek transaction detail
    //     $cek_detail_transaction = DetailTransaction::where('product_id', $product->id)->where('transaction_id', $transaction_new->id)->first();
    //     if (empty($cek_detail_transaction)) {
    //         $detail_transaction = new DetailTransaction();
    //         $detail_transaction->product_id = $product->id;
    //         $detail_transaction->transaction_id = $transaction_new->id;
    //         $detail_transaction->user_id = Auth::user()->id;
    //         $detail_transaction->qty = $request->jumlah_pesan;
    //         $detail_transaction->total_harga = $product->price * $request->jumlah_pesan;
    //         $detail_transaction->save();
    //     } else {
    //         $detail_transaction = DetailTransaction::where('product_id', $product->id)->where('transaction_id', $transaction_new->id)->first();
    //         $detail_transaction->qty = $detail_transaction->qty + $request->jumlah_pesan;


    //         //harga sekarang
    //         $price_detail_transaction_new = $product->price * $request->jumlah_pesan;
    //         $detail_transaction->total_harga =  $detail_transaction->total_harga + $price_detail_transaction_new;
    //         $detail_transaction->update();
    //     }

    //     //jumlah total
    //     $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
    //     $transaction->total_bayar =  $transaction->total_bayar + $product->price * $request->jumlah_pesan;
    //     $transaction->update();

    //     return redirect('check-out');
    // }

    public function pesan(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        // Validasi apakah melebihi qty (stok)
        if ($request->jumlah_pesan > $product->qty) {
            return redirect('transaction/' . $id)->with('error', 'Jumlah pesanan melebihi stok yang tersedia.');
        }

        $user = auth()->user();

        // Validasi apakah saldo cukup
        $totalHarga = $product->price * $request->jumlah_pesan;
        if ($user->deposit < $totalHarga) {
            return redirect('transaction/' . $id)->with('error', 'Saldo Anda tidak cukup untuk melakukan pesanan.');
        }

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
            $detailTransaction->user_id = $user->id;
            $detailTransaction->qty = $request->jumlah_pesan;
            $detailTransaction->total_harga = $totalHarga;
            $detailTransaction->save();
        } else {
            $detailTransaction->qty += $request->jumlah_pesan;
            $detailTransaction->total_harga += $totalHarga;
            $detailTransaction->save();
        }

        // Jumlah total
        $transaction->total_bayar += $totalHarga;
        $transaction->save();

        return redirect('check-out');
    }


    public function check_out()
    {
        $user = auth()->user();
        $transaction = Transaction::where('user_id', $user->id)->where('status', 0)->first();
        $detail_transaction = [];

        if (!empty($transaction)) {
            $detail_transaction = DetailTransaction::where('transaction_id', $transaction->id)->get();

            // Periksa saldo member
            $totalBayar = $transaction->total_bayar;
            if ($user->deposit < $totalBayar) {
                return redirect('transaction.check_out')->back()->with('error', 'Saldo Anda tidak cukup untuk melakukan pembayaran.');
            }

            // Kurangi saldo member
            $user->deposit -= $totalBayar;
            $user->save();

            // Simpan potongan saldo ke dalam tabel deposit_histories
            DepositHistory::create([
                'user_id' => $user->id,
                'nominal' => $totalBayar,
                'status' => 0,
                'deskripsi' => 'Saldo Terpotong ( Pembayaran Product )'
            ]);

            // Simpan potongan saldo ke user tenant (pemilik produk)
            $tenantUser = User::where('role', 'Tenant')->first(); // Mengambil user tenant
            $tenantUser->deposit += $totalBayar;
            $tenantUser->save();

            // Simpan potongan saldo ke dalam tabel deposit_histories untuk tenant
            DepositHistory::create([
                'user_id' => $tenantUser->id,
                'nominal' => $totalBayar,
                'status' => 1,
                'deskripsi' => 'Saldo Masuk (Pembayaran Member)'
            ]);
        }

        return view('transaction.check_out', compact('transaction', 'detail_transaction'));
    }







    public function delete($id)
    {
        $detail_transaction = DetailTransaction::where('id', $id)->first();

        $transaction = Transaction::where('id', $detail_transaction->transaction_id)->first();
        $transaction->total_bayar = $transaction->total_bayar - $detail_transaction->total_harga;
        $transaction->update();


        $detail_transaction->delete();
        return redirect('check-out');
    }


    public function konfirmasi()
    {

        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $transaction_id = $transaction->id;
        $transaction->status = 1;
        $transaction->update();

        $detail_transactions = DetailTransaction::where('transaction_id', $transaction_id)->get();
        foreach ($detail_transactions as $detail_transaction) {
            $product = Product::where('id', $detail_transaction->product_id)->first();
            $product->qty = $product->qty - $detail_transaction->qty;
            $product->update();
        }


        return redirect('history/' . $transaction_id);
    }
}
