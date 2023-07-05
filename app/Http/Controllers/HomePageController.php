<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $users = User::all();

        return view('/homepage/index', compact('product', 'users'));
    }
}
