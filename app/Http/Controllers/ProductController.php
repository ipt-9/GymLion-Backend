<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = User::all();
        return response()->json($products);
    }
    public function byCategory()
    {
        $products = User::all();
        return response()->json($products);
    }
    public function byId()
    {
        $products = User::all();
        return response()->json($products);
    }

}
