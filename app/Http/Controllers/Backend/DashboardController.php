<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('masterdata/index');
    }

    public  function administrator()
    {
        return view('masterdata/index');
    }

    public function tenant()
    {
        return view('masterdata/index');
    }

    public  function member()
    {
        return view('masterdata/index');
    }
}
