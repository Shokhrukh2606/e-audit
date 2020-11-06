<form action="/admin/list_users" class="row mb-3" id="filterer">
    &nbsp;
    <div class="col">
        <label>F.I.O</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.name') }}" name="filter[name]">
    </div>
    <div class="col">
        <label>Role</label>
        <select class="form-control" name="filter[group_id]">
            <option value="">Role</option>
            @foreach ($groups as $item)
                <option value="{{ $item->id }}"
                    {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label>Phone</label>
        <input class="form-control" type="phone" type="text" name="filter[phone]"
            value="{{ request()->input('filter.phone') }}">
    </div>
    <div class="col">
        <label>INN</label>
        <input class="form-control" type="number" name="filter[inn]" value="{{ request()->input('filter.inn') }}">
    </div>
    <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">Search</button>
</form>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Пользователи
        </h1>
        <a class="btn btn-sm btn-info" href="{{ route('admin.create_user') }}">Create</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
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
    </div>
</div>
