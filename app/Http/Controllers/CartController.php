<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Auth;
use App\Cart;
use App\OrdenItem;

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
    public function detalle()
    {
      $cart = \Session::get('cart');
      if(count($cart) <= 0){
        return redirect()->route('home');
      }
      $total=$this->total();
      return view('detalleCompra',compact('cart','total'));
    }
    public function thanks()
    {
      $total = 0;
      $productos = Product::all();
      $cart = \Session::get('cart');
      foreach($cart as $item){
        $total += $item->quantity * $item->price;
        foreach ($productos as $producto) {
          if($producto->id == $item->id)
          $producto->stock -=$item->quantity;
          $producto->update();
        }
      }
      $order = Cart::create([
        'total' => $total,
        'userid' => \Auth::user()->id,
        'statusbuyid' => 1
      ]);
      foreach($cart as $producto){
        $productos = OrdenItem::create([
          'price' => $producto->price,
          'quantity' => $producto->quantity,
          'product_id' => $producto->id,
          'cart_id' => $order->id
        ]);
      }

      $this->trash();
      return redirect()->route('compras-show')->with('status','Su pedido se esta Preparando...Muchas gracias por su compra');
    }
}
