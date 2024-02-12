@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <div class="row pt-4 px-4 align-items-center justify-content-center">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">New Category</h6>
                <form action={{ route('categories.store') }} method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="jhondoe" value={{ old('name') }}>
                        <label for="name">Name</label>
                        @error('name')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 150px;"
                            name="description">{{ old('description') }}</textarea>
                        <label for="floatingTextarea">Description</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Category Image</label>
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
