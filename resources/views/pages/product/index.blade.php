@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="container-fluid pt-4 px-4">
        @if (session('success'))
            @include('components.alert', ['type' => 'success', 'message' => session('success')])
        @endif
        @if (session('error'))
            @include('components.alert', ['type' => 'danger', 'message' => session('error')])
        @endif
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Products</h6>
                <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">Add New</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-hover mb-10">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('pages.product.table')
                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: "{{ URL::to('products') }}",
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('tbody').html(data);
                }
            });
        })
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>
@endpush
