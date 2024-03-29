<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $product = Product::with(['galleries', 'user'])->where('slug', $id)->firstOrFail();        

        return view('pages.product-detail', [
            'product' => $product
        ]);
    }

    public function add(Request $request, $id) 
    {
        $data = [
            "products_id" => $id,
            "users_id" => Auth::user()->id,
        ];

        Cart::create($data);

        return redirect()->route('shop-cart');
    }
}
