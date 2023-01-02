<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function processPay(Request $request)
    {
        $user = User::firstOrCreate(
            ['email' =>  $request->email,],
            [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => bcrypt('123123123'),
            ]
        );

        if (!$user->hasStripeId()) {
            $user->createAsStripeCustomer();
        }

        try {
            $user->charge($request->total * 100, $request->paymentMethod);
            $order = Order::create($request->order_data + ['name' => $request->name, 'email' => $request->email]);
            foreach($request->products as $product) {
                $order->products()->attach($product['product_id'], ['quantity' => $product['quantity'], 'notes' => $product['notes']]);
            }
        } catch (Exception $e) {
            return response()->json(['route' => route('payment.error'), 'success' => false]);
        }

        return response()->json(['route' => route('payment.success', $order), 'success' => true]);
    }

    public function error()
    {
        return view('payment.error');
    }
    
    public function success(Order $order)
    {
        return view('payment.success', compact('order'));
    }

}
