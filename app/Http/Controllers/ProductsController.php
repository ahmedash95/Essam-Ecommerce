<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;

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
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;
    	$cart = new Cart($oldCart);
    	$cart->add($product, $product->id);
    	$request->session()->put('cart', $cart);
    	return redirect()->route('products.index');

    }

    public function getCart()
    {
    	if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $products = $cart->items;
        $totalPrice = $cart->totalPrice;
        return view('shop.shopping-cart', compact('products', 'totalPrice'));
    }
}
