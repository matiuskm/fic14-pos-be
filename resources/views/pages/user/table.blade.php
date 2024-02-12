@foreach ($users as $user)
    <tr>
        <td>{{ ($users->currentpage() - 1) * $users->perpage() + $loop->index + 1 }}</td>
        <td class="text-nowrap">{{ $user->name }}</td>
        <td class="text-nowrap">{{ $user->username }}</td>
        <td class="text-nowrap">{{ $user->email }}</td>
        <td>{{ ucfirst($user->role) }}</td>
        <td class="d-flex"><a class="btn btn-sm btn-primary me-2" href="{{ route('users.edit', $user->id) }}"><i
                    class="fa fa-edit"></i></a>
            <a class="btn btn-sm btn-danger me-2" href=""
                onclick="event.preventDefault(); if (confirm('Are you sure want to delete this user?')) document.getElementById('del-{{ $user->id }}').submit();"><i
                    class="fa fa-times"></i></a>
            <form id="del-{{ $user->id }}" class="d-none" action="{{ route('users.destroy', $user->id) }}"
                method="post">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>
@endforeach
<tr>
    <td colspan="6">{{ $users->links() }}</td>
</tr>
