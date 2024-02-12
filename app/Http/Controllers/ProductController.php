<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->paginate(10);
            return view('pages.product.table', compact('products'))->render();
        }

        $products = Product::paginate(10);
        return view('pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {

            $data = $request->validated();
            if ($request->hasFile('image')) {
                $filename = \Illuminate\Support\Str::uuid() . '.' . $request->image->extension();
                $imagePath = 'products/' . $filename;

                Storage::disk('s3')->put($imagePath, file_get_contents($data['image']));

                $data['image'] = $filename;
            }

            Product::create($data);
            return redirect()->route('products.index')->with('success', 'Product created successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to create product');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $filename = \Illuminate\Support\Str::uuid() . '.' . $request->image->extension();
                $imagePath = 'products/' . $filename;

                Storage::disk('s3')->put($imagePath, file_get_contents($data['image']));

                $data['image'] = $filename;
            }

            $product->update($data);
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to update product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('products.index')->with('error', 'Failed to delete product');
        }
    }
}
