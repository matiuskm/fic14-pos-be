@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <div class="row pt-4 px-4 align-items-center justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">New Product</h6>
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="jhondoe" value="{{ $product->name }}">
                        <label for="name">Name</label>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                            name="description">{{ $product->description }}</textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" id="category_id" name="category_id" aria-label="Add category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <label for="category_id">Choose product category</label>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                            name="stock" placeholder="0" value="{{ $product->stock }}">
                        <label for="stock">Stock</label>
                        @error('stock')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" placeholder="0" value="{{ $product->price }}">
                        <label for="price">Price</label>
                        @error('price')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status"
                            {{ $product->status ? 'checked' : '' }}>
                        <label class="form-check-label" for="status">Status</label>
                        @error('status')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="is_favorite" name="is_favorite"
                            {{ $product->is_favorite ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_favorite">Favorite</label>
                        @error('is_favorite')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Product Image</label>
                        <input class="form-control @error('image') is-invalid
                        @enderror"
                            type="file" id="formFile" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
