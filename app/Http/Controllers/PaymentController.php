<?php

namespace App\Http\Controllers;

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
        } catch (Exception $e) {
            return response()->json(['route' => route('payment.error'), 'success' => false]);
        }

        return response()->json(['route' => route('payment.success'), 'success' => true]);
    }

    public function error()
    {
        return view('payment.error');
    }
    
    public function success()
    {
        return view('payment.success');
    }

}
