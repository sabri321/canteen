<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DepositHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function historyDeposit()
    {
        $user = Auth::user();
        $depositHistories = DepositHistory::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('member.history-deposit', compact('depositHistories'));
    }
}
