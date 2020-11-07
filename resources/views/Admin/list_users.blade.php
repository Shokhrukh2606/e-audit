<form action="/admin/list_users" class="row mb-3" id="filterer">
    &nbsp;
    <div class="col">
        <label>{{__('front.fio')}}</label>
        <input class="form-control" type="text" value="{{ request()->input('filter.name') }}" name="filter[name]">
    </div>
    <div class="col">
        <label>{{__('front.role')}}</label>
        <select class="form-control" name="filter[group_id]">
        <option value="">{{__('front.role')}}</option>
            @foreach ($groups as $item)
                <option value="{{ $item->id }}"
                    {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
    <label>{{__('front.phone')}}</label>
        <input class="form-control" type="phone" type="text" name="filter[phone]"
            value="{{ request()->input('filter.phone') }}">
    </div>
    <div class="col">
        <label>{{__('front.inn')}}</label>
        <input class="form-control" type="number" name="filter[inn]" value="{{ request()->input('filter.inn') }}">
    </div>
    <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{__('front.search')}}</button>
</form>

<div class="card">
    <div class="card-header">
        <h1 class="card-title">Пользователи
        </h1>
        <a class="btn btn-sm btn-info" href="{{ route('admin.create_user') }}">{{__('custom.create')}}</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
            <thead>
                <th>ID</th>
                <th>{{__('front.fio')}}</th>
                <th>{{__('front.funds')}}</th>
                <th>{{__('front.role')}}</th>
                <th>{{__('front.phone')}}</th>
                <th>{{__('front.inn')}}</th>
                <th>{{__('custom.show')}}</th>
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
                    <td><a href="{{ route('admin.view_user', $user->id) }}">{{__('custom.show')}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
