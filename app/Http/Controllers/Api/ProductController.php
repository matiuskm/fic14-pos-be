<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $products = \App\Models\Product::all();

        foreach ($products as $product) {
            $product->image = $product->getImage();
        }

        return response()->json([
            'status' => "success",
            'message' => 'Product list',
            'data' => $products,
        ], 200);
    }
}
