<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {

        Stripe::setApiKey(config('services.stripe.secret'));

        // Get request data
        $planName = $request->plan_name;
        $duration = $request->duration;
        $price = $request->price;

        // Create Stripe Checkout Session
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'unit_amount' => $price * 100,
                        'product_data' => [
                            'name' => ucfirst($planName).' Plan ('.str_replace('_', ' ', $duration).')',
                        ],
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('subscription.index'),
            'metadata' => [
                'user_id' => Auth::id(),
                'plan_name' => $planName,
                'duration' => $duration,
                'price' => $price,
            ],
        ]);

        return redirect($session->url);

    }

    public function success(Request $request)
    {
        return view('subscription.success');
    }
}
