<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use DB;


class ProductController extends Controller
{
    public function index()
    {
        $allProduct = Product::paginate(10);
        foreach ($allProduct as $product) {
            $product->discountPercentage = $product->price + ($product->price * ($product->discountPercentage/100));
        }
        return view('home', ['products' => $allProduct]);
    }

    public function detail($id)
    {
        $product = Product::where('id', $id)->first();
        return view('detail', ['product' => $product]);
    }
}
