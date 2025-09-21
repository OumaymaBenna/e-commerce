<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function create(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $lineItems = [];

        foreach ($request->cart as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd', // ou 'eur', 'dzd', 'tnd', etc.
                    'unit_amount' => intval($item['price'] * 100),
                    'product_data' => [
                        'name' => $item['name'],
                    ],
                ],
                'quantity' => 1,
            ];
        }

        $session = Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('home') . '?success=true',
            'cancel_url' => route('home') . '?cancel=true',
        ]);

        return response()->json(['id' => $session->id]);
    }
}
