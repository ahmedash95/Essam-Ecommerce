<?php

namespace App;

use Illuminate\Support\Facades\Session;


class Cart
{
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;

    public function __construct(){
        $this->load();
    }

    public function get(){
        return $this->load();
    }

    private function load(){
        $data = Session::has('cart') ? Session::get('cart') : new \stdClass;
        if(!$data) return;
        $this->items = $data->items;
        $this->totalQuantity = $data->totalQuantity;
        $this->totalPrice = $data->totalPrice;
        return $data;
    }

    private function updateCart(){
        $data = new \StdClass;
        $data->items = $this->items;
        $data->totalQuantity = $this->totalQuantity;
        $data->totalPrice = $this->totalPrice;
        Session::put('cart',$data);
    }

    public function add(Product $product)
    {
        // Load Product cart data if exists , if It's not exists
        // then we will create it
        if(array_key_exists($product->id, $this->items)) {
            $item = $this->items[$product->id];
        } else {
            $item = ['quantity'=> 0, 'price' => $product->price, 'product' => $product];            
        }
        
        // Increase the count of quantity and recalculate the price of product
    	$item['quantity']++;
    	$item['price'] = $product->price * $item['quantity'];
    	$this->items[$product->id] = $item;
    	$this->totalQuantity++;
    	$this->totalPrice += $product->price;
        // then let's update our cart
        $this->updateCart();
    }
    
}
