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
    public function byCategory(string $category)
    {
        switch ($category){
            case "supplements":
                $id = 1;
                break;
            case "lion":
                $id = 2;
                break;
            case "lioness":
                $id = 3;
        }
        return Product::where('brand_id', $id)->get();
    }
    public function byId()
    {
        $products = Product::all();
        return response()->json($products);
    }

}
