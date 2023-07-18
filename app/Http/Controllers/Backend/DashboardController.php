<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        return view('masterdata/index');
    }

    public  function administrator()
    {
        $jumlahUserMember = User::where('role', 'Member')->count();
        $jumlahUserTenant = User::where('role', 'Tenant')->count();
        return view('masterdata/Administrator', compact('jumlahUserMember', 'jumlahUserTenant'));
    }

    public function tenant()
    {
        return view('masterdata/Tenant');
    }


    public function member()
    {
        $date = Carbon::today();
        $userId = Auth::user()->id;
    
        
        // Menghitung selisih saldo
        $saldoAwal = Auth::user()->saldo_awal;
        $totalPendapatanHarian = Transaction::whereDate('created_at', $date)
            ->where('user_id', $userId)
            ->sum('total_bayar');
        $selisihSaldo = $saldoAwal + $totalPendapatanHarian;
    
        return view('masterdata/Member', compact('selisihSaldo'));
    }
    
}
