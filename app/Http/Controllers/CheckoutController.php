<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('pk_test_51N4Ia5SJ1UYNZRihdQIIfzZb05pMLX1ezs0n2umyWxHxiKcsK2GLUTdl36Bp8exdpzZT6KaLILHw3MSeI5UxcTfi00D6MkmhIE');

		$amount = 100;
		$amount *= 100;
        $amount = (int) $amount;

        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'Stripe Test Payment',
			'amount' => $amount,
			'currency' => 'INR',
			'description' => 'Payment From S-Basket',
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'));

    }


}
