<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
class CartController extends Controller
{
    public function __construct()
    {
      if(!\Session::has('cart')) \Session::put('cart',array());
    }
    public function show()
    {
      $cart= \Session::get('cart');
      $total = $this->total();
      return view('compras',compact('cart','total'));
    }
    public function add(Product $product)
    {
      $cart = \Session::get('cart');
      $product->quantity=1;
      $cart[$product->id] = $product;
      \Session::put('cart',$cart);
      return redirect()->route('compras-show');
    }
    public function delete(Product $product)
    {
      $cart = \Session::get('cart');
      unset($cart[$product->id]);
      \Session::put('cart',$cart);
      return redirect()->route('compras-show');
    }
    public function update(Product $product, $quantity)
    {
      $cart = \Session::get('cart');
      $cart[$product->id]->quantity = $quantity;
      \Session::put('cart',$cart);
      return redirect()->route('compras-show');
    }
    public function trash()
    {
      \Session::forget('cart');
      return redirect()->route('compras-show');
    }
    public function total()
    {
      $cart = \Session::get('cart');
      $total = 0;
      foreach($cart as $item){
        $total += $item->price * $item->quantity;
      }
      return $total;
    }
}
