<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%')
                ->paginate(10);
            return view('pages.category.table', compact('categories'))->render();
        }

        $categories = Category::paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $filename = \Illuminate\Support\Str::uuid() . '.' . $request->image->extension();
                $imagePath = 'categories/' . $filename;

                Storage::disk('s3')->put($imagePath, file_get_contents($data['image']));

                $data['image'] = $filename;
            }

            Category::create($data);

            return redirect()->route('categories.index')->with('success', 'Category created successfully');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Error creating category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {


        try {
            $data = $request->validate([
                'name' => 'required',
                'description' => 'string',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $filename = \Illuminate\Support\Str::uuid() . '.' . $request->image->extension();
                $imagePath = 'categories/' . $filename;

                Storage::disk('s3')->put($imagePath, file_get_contents($data['image']));

                $data['image'] = $filename;
            }

            $category->update($data);

            return redirect()->route('categories.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Error updating category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('categories.index')->with('error', 'Error deleting category');
        }
    }
}
