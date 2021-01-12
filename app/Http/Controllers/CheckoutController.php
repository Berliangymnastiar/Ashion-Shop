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
        $user = Auth::user();
        $user->update($request->except('total_price'));

        // Product checkout
        $code = 'ASHION-' . mt_rand(000000, 999999);
        $carts = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();

        // Transaction Create
        $transaction = Transaction::create([
            'users_id' => Auth::user()->id,
            'insurance_price' => 0,
            'shipping_price' => 0,
            'total_price' => (int) $request->total_price,
            'transaction_status' => 'PENDING',
            'code' => $code  
        ]);

        foreach($carts as $cart) {
            $trx = 'TRX-' . mt_rand(000000, 000000);
            
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'products_id' => $cart->product->id,
                'price' => $cart->product->id,
                'shipping_status' => 'PENDING',
                'resi' => '',
                'code' => $trx  
            ]);
        }

        //Konfigurasi Midtrans

        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        // Make array for transfer data to midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->number_phone,
                'shipping_address' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->number_phone,
                    'address' => Auth::user()->address_one,
                    'city' => Auth::user()->provinces_id,
                    'postal_code' => Auth::user()->zip_code,
                    'country_code' => Auth::user()->country
                ]
            ],
            'enabled_payments' => [
                'permata_va', 'bca_klikpay', 'bca_klikbca', 'indomaret', 'gopay', 'shopeepay', 'bni_va', 'bca_va', 'alfamart', 'bank_transfer'
            ], 
            'vtweb' => []
        ];

        
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }
   
    public function callback(Request $request) 
    {
        //
    }
}
