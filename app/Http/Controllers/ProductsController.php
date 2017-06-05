<?php

namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('shop.index', compact('products'));
    }
}
