@foreach ($categories as $category)
    <tr>
        <td><img class="img-rounded" height="55" src="{{ $category->getImage() }}" title="{{ $category->name }}"></td>
        <td class="text-nowrap">{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td><span class="d-flex">
                <a class="btn btn-sm btn-primary me-2" href="{{ route('categories.edit', $category) }}"><i
                        class="fa fa-edit"></i></a>
                <a class="btn btn-sm btn-danger me-2" href=""
                    onclick="event.preventDefault(); if (confirm('Are you sure want to delete this category?')) document.getElementById('del-{{ $category->id }}').submit();"><i
                        class="fa fa-times"></i></a>
                <form id="del-{{ $category->id }}" class="d-none" action="{{ route('categories.destroy', $category) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                </form>
            </span>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="4">{{ $categories->links() }}</td>
</tr>
