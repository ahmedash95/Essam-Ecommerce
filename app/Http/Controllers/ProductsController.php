<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductsController extends Controller
{
    public function getIndex()
    {
    	$products = Product::all();
    	return view('shop.index', compact('products'));
    }
}
