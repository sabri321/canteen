<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $transaction = Transaction::where('user_id', Auth::user()->id)->where('status', '!=', 0)->get();
        return view('history.index', compact('transaction'));
    }

    public function detail($id)
    {
    	$transaction = Transaction::where('id', $id)->first();
    	$detail_transaction = DetailTransaction::where('transaction_id', $transaction->id)->get();

     	return view('history.detail', compact('transaction','detail_transaction'));
    }
}
