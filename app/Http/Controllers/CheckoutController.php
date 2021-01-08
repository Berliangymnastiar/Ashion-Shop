<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Cart;
use App\Transaction;
use App\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

class CheckoutController extends Controller
{
    public function process(Request $request) 
    {
        // Save user data
        $user = Auth::user()->id;
        $user->update($request->except('total_price'));

        // Product checkout
        $code = 'ASHION-' . mt_rand(00000, 999999);
        $code = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();

        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code  
        ]);
    }
   
    public function callback(Request $request) 
    {
        //
    }
}
