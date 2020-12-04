<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();

        return view('pages.shop-cart', [
            'carts' => $carts
        ]);
    }

    public function delete(Request $request, $id) 
    {
        $carts = Cart::findOrFail($id);

        $carts->delete();
        return redirect('cart');
    }
}
