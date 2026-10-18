<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featuredProducts = Product::query()->where('featured', true)->get();

        return Inertia::render('Welcome', compact('categories', 'featuredProducts'));
    }

    public function market()
    {
        $categories = Category::all();
        $products = Product::all();

        return Inertia::render('product/ProductList', compact('categories', 'products'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        $similarProduct = Product::query()->where('category_id', $product->category_id)->get();
        return Inertia::render('product/ProductDetail', compact('product', 'similarProduct'));
    }
}
