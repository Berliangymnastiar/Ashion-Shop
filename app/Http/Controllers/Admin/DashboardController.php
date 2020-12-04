<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $revenue = Transaction::sum('total_price');
        $transaction = Transaction::count();
        return view('admin.dashboard', [
            'user' => $user,
            'revenue' => $revenue,
            'transaction' => $transaction
        ]);
    }
}