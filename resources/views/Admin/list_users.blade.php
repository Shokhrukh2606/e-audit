<form action="/admin/list_users" class="row mb-3" id="filterer">
    &nbsp;
    <div class="col">
        <label>{{lang('fio')}}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.full_name') }}" name="filter[full_name]">
    </div>
    <div class="col">
        <label>{{lang('role')}}</label>
        <select class="form-control" name="filter[group_id]">
        <option value="">{{lang('role')}}</option>
            @foreach ($groups as $item)
                <option value="{{ $item->id }}"
                    {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                    {{ lang($item->name)}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
    <label>{{lang('anotherPhoneNumber')}}</label>
        <input class="form-control" type="phone" type="text" name="filter[phone]"
            value="{{ request()->input('filter.phone') }}">
    </div>
    <div class="col">
        <label>{{lang('inn')}}</label>
        <input class="form-control" type="number" name="filter[inn]" value="{{ request()->input('filter.inn') }}">
    </div>
    <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{lang('search')}}</button>
</form>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">
        {{lang('users')}}
        </h1>
        <a class="btn btn-sm btn-info" href="{{ route('admin.create_user') }}">{{lang('create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>{{lang('id')}}</th>
                <th>{{lang('fio')}}</th>
                <th>{{lang('fund')}}</th>
                <th>{{lang('role')}}</th>
                <th>{{lang('anotherPhoneNumber')}}</th>
                <th>{{lang('inn')}}</th>
                <th>{{lang('show')}}</th>
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
                    <td><a href="{{ route('admin.view_user', $user->id) }}">{{lang('show')}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
