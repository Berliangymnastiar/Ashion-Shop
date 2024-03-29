<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    { 
        $categories = Category::take(6)->get();
        $products = Product::with(['galleries'])->take(8)->get();
        $products = Product::with(['galleries'])->paginate(16);
        
        return view('pages.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with(['galleries'])->where('categories_id', $category->id)->paginate(16);

        return view('pages.home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
