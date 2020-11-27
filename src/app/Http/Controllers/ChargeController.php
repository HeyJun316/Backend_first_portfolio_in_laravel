<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Cart;

class ChargeController extends Controller
{
    public function charge(Request $request, Cart $cart)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount' => 1000,
                'currency' => 'jpy'
            ));
            $order_number = $cart->createNumber();
            $add_history = $cart->addHistory($order_number);
            $checkout_info = $cart->checkoutCart();

            return view('home.cart.payment_comp');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
