<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth; //(+)

class Cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = ['user_id', 'product_id','order_number'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\Users');
    }



    public function addCart($product_id)
    {
        $user_id = Auth::id();
        $cart_add_info = Cart::firstOrCreate(['product_id' => $product_id, 'user_id' => $user_id]);
        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに追加済みです';
        }

        return $message;
    }

    public function createNumber(){
        $today = date('Ymd');
        $rand = rand(0,9999);
        $order_number = $today . $rand;
        return $order_number;
    }

    public function addHistory($order_number){
        $login_id = Auth::id();
        $cart_infos = Cart::where('user_id',$login_id)->get();
        foreach($cart_infos as $info){
            $history = new History();
            $history->product_id = $info['product_id'];
            $history->user_id = $info['user_id'];
            $history->order_number = $order_number;
            $history->save();

        }
    }

    public function showCart()
    {
        $user_id = Auth::id();
        $data['carts'] = $this->where('user_id', $user_id)->get();
        $data['count'] = 0;
        $data['sum'] = 0;
        foreach ($data['carts'] as $cart) {
            $data['count']++;
            $data['sum'] += $cart->product->price;
        }
        return $data;
    }

    public function cartDelete($product_id)
    {
        $user_id = Auth::id();
        $delete = $this->where('user_id', $user_id)->where('product_id', $product_id)->delete();

        if ($delete > 0) {
            $message = 'カートから削除しました。';
        } else {
            $message = 'カートから削除失敗しました。';
        }

        return $message;
    }

    public function checkoutCart(){
        $user_id = Auth::id();
        $checkout_products = $this->where('user_id', $user_id)->get();
        $this->where('user_id',$user_id)->delete();
        return $checkout_products;
    }

}
