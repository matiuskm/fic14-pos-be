<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = \App\Models\Category::all();

        return response()->json([
            'status' => "success",
            'message' => 'Category list',
            'data' => $categories,
        ], 200);
    }
}
