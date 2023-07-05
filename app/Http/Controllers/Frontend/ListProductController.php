<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ListProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $users = User::all();

        return view('homepage/product', compact('product', 'users'));
    }
}
