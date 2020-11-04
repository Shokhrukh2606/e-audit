<a href="{{ route('admin.create_user') }}">Create</a>
<form action="/admin/list_users" id="filterer">
    &nbsp;
    <label>F.I.O</label>
    <input type="text" value="{{ request()->input('filter.name')}}" name="filter[name]">
    <label>Role</label>
    <select name="filter[group_id]">
        <option value="">Role</option>
        @foreach ($groups as $item)
            <option value="{{ $item->id }}" {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                {{ $item->name }}</option>
        @endforeach
    </select> </td>
    <label>Phone</label>
    <input type="text" name="filter[phone]" value="{{ request()->input('filter.phone') }}">
    <label>INN</label>
    <input type="number" name="filter[inn]" value="{{ request()->input('filter.inn') }}">
    <button type="submit">Search</button>
</form>
<table>
    <thead>
        <th>ID</th>
        <th>Full Name</th>
        <th>Funds</th>
        <th>Group name</th>
        <th>Phone</th>
        <th>INN</th>
        <th>View</th>
    </thead>
    </tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->fullname }}</td>
            <td>{{ $user->funds }}</td>
            <td>{{ $user->group->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->inn }}</td>
            <td><a href="{{ route('admin.view_user', $user->id) }}">View</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
