<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_featured', true)
                                  ->with('category')
                                  ->take(8)
                                  ->get();

        $discountedProducts = Product::where('discount', '>', 0)
                                   ->orderBy('discount', 'desc')
                                   ->take(3)
                                   ->get();

        $categories = Category::withCount('products')
                            ->orderBy('products_count', 'desc')
                            ->take(6)
                            ->get();

        return view('home', compact('featuredProducts', 'discountedProducts', 'categories'));
    }
}