<?php

namespace App\Http\Controllers;

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


}
