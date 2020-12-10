<?php

namespace App\Http\Controllers;

use App\Models\Cart; //cartモデルを使う＋eloquant(+)
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function addMyCart(Request $request, Cart $cart)
    {
        $product_id = $request->input('product_id');
        $size_id = $request->input('size');
        $message = $cart->addCart($product_id, $size_id);
        $data = $cart->showCart();
        $size = $request->input('size', null);
        return view('home.cart.cart', $data)->with([
            'message' => $message,
        ]);
    }

    public function cartDelete(Request $request, Cart $cart)
    {
        $product_id = $request->input('product_id');
        $size_id = $request->input('size_id');
        $message = $cart->cartDelete($product_id, $size_id);

        $data = $cart->showCart();

        return view('home.cart.cart', $data)->with('message', $message);
    }
}
