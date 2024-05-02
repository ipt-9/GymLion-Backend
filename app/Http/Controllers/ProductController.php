<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function byCategory()
    {
        $products = Product::all();
        return response()->json($products);
    }
    public function byId()
    {
        $products = Product::all();
        return response()->json($products);
    }

}
