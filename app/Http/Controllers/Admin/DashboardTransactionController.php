<?php

namespace App\Http\Controllers\Admin;

use App\TransactionDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardTransactionController extends Controller
{
    public function index() 
    {
        $sellTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('product', function($product){
                                $product->where('users_id', Auth::user()->id);    
                            })->get();

        $buyTransactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
                            ->whereHas('transaction', function($transaction){
                                $transaction->where('users_id', Auth::user()->id);    
                            })->get(); 

        return view('admin.dashboard-transaction', [
            'sellTransactions' => $sellTransactions,
            'buyTransactions' => $buyTransactions
        ]);
    }
}
