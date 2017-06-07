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
    	
        Cart::add($product);

    	return redirect()->route('products.index');

    }

    public function getCart()
    {
    	if(count(Cart::get()->items) < 1) {
            return view('shop.shopping-cart');
        }

        $items = Cart::get()->items;
        $totalPrice = Cart::get()->totalPrice;
        return view('shop.shopping-cart', compact('items', 'totalPrice'));
    }
}
