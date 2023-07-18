<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function generate(Request $request)
    {
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalAkhir = $request->input('tanggal_akhir');

        $laporanTransaksi = Transaction::whereBetween('created_at', [$tanggalMulai, $tanggalAkhir])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('laporan.generate', compact('laporanTransaksi'));
    }
}
