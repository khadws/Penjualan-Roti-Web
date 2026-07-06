<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $products = Product::where('kategory', 'rekomendasi')->get();
        return view('dashboard', compact('products'));
    }
}
