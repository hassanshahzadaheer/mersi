<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\support\Facades\Auth;


class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = [
            '1_year' => [
                'basic' => [
                    'title' => 'Basic Plan',
                    'price' => 1000.00,
                    'features' => ['Access to ISO audits', 'Priority support'],
                ],
                'platinum' => [
                    'title' => 'Platinum Plan',
                    'price' => 1500.00,
                    'features' => ['Access to ISO audits', 'Priority support', 'Personalized onboarding'],
                ],
            ],
            '2_year' => [
                'basic' => [
                    'title' => 'Basic Plan',
                    'price' => 1800.00,
                    'features' => ['Access to ISO audits', 'Priority support'],
                ],
                'platinum' => [
                    'title' => 'Platinum Plan',
                    'price' => 2700.00,
                    'features' => [
                        'Access to ISO audits', 'Priority support', 'Personalized onboarding',
                    ],
                ],
            ],
        ];

        return view('subscription.index', compact('plans'));
    }

    public function payments()
    {
        $subscriptions = Subscription::where('user_id', Auth::id())->get();
        return view('subscription.payments.payment-list', compact('subscriptions'));
    }

    public function subscribe(Request $request)
    {
        $user = Auth::user();

        // Determine the price based on duration and plan
        $plans = [
            '1_year' => [
                'basic' => 1000,
                'platinum' => 1500,
            ],
            '2_year' => [
                'basic' => 1800,
                'platinum' => 2700,
            ],
        ];

        $planName = $request->plan_name;
        $duration = $request->duration;

        if (!isset($plans[$duration][$planName])) {
            return redirect()->back()->with('error', 'Invalid plan selected.');
        }

        $price = $plans[$duration][$planName];
        $now = Carbon::now();
        $expire = $duration === '1_year' ? $now->copy()->addYear() : $now->copy()->addYears(2);

        // Create the subscription
        Subscription::create([
            'user_id' => $user->id,
            'plan_name' => $planName,
            'status' => 'active',
            'price' => $price,
            'currency' => 'USD',
            'renewal_date' => null,
            'expire_date' => $expire,
        ]);

        return redirect()->route('subscription.payment')->with('success', 'Subscription successful!');
    }

}
