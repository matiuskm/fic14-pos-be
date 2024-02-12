@foreach ($products as $product)
    <tr>
        <td><img class="img-rounded" height="55" src="{{ $product->getImage() }}" title="{{ $product->name }}"></td>
        <td class="text-nowrap">{{ $product->name }}</td>
        <td>{{ $product->category->name }}</td>
        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
        <td>{{ $product->status ? 'Enabled' : 'Disabled' }}</td>
        <td><span class="d-flex">
                <a class="btn btn-sm btn-primary me-2" href="{{ route('products.edit', $product) }}"><i
                        class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger me-2" href=""
                    onclick="event.preventDefault(); if (confirm('Are you sure want to delete this product?')) document.getElementById('del-{{ $product->id }}').submit();"><i
                        class="fa fa-times"></i></a>
                <form id="del-{{ $product->id }}" class="d-none" action="{{ route('products.destroy', $product) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                </form>
            </span>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">{{ $products->links() }}</td>
</tr>
