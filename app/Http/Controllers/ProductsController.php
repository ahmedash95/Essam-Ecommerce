<?php

namespace App\Http\Controllers;

use Session;
use App\Product;
use Facades\App\Cart;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('shop.index', compact('products'));
    }

    public function addToCart(Request $request, $id)
    {
    	$product = Product::find($id);
    	
        Cart::add($product, $product->id);

    	return redirect()->route('products.index');

    }

    public function getCart()
    {
    	if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $products = Cart::get()->items;
        $totalPrice = Cart::get()->totalPrice;
        return view('shop.shopping-cart', compact('products', 'totalPrice'));
    }
}
