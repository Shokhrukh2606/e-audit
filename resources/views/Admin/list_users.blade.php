<script>
    function changeDistrict(item){
        var d = document.getElementById("region").value;
        var old=document.querySelectorAll('[data-parent]');
        var index = 0, length = old.length;
        for ( ; index < length; index++) {
            old[index].style.display="none"
        }
        var needed=document.querySelectorAll('[data-parent="'+d+'"]');
        var index = 0, length = needed.length;
        for ( ; index < length; index++) {
            needed[index].style.display="block"
        }
    }
</script>
<form action="{{route('admin.list_users')}}" class="row mb-3" id="filterer">
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
            <option value="{{ $item->id }}" {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                {{ lang($item->name)}}
            </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label>{{lang('anotherPhoneNumber')}}</label>
        <input class="form-control" type="phone" type="text" name="filter[phone]" value="{{ request()->input('filter.phone') }}">
    </div>
    <div class="col">
        <label>{{lang('inn')}}</label>
        <input class="form-control" type="number" name="filter[inn]" value="{{ request()->input('filter.inn') }}">
    </div>
    <div class="col">
        <label>{{__('front.status')}}</label>
        <select class="form-control" name="filter[status]">
            <option value=""> {{lang('select')}}</option>
            <option {{ request()->input('filter.status') == 'active' ? 'selected' : '' }} value="active">
                {{lang('active')}}
            </option>
            <option {{ request()->input('filter.status') == 'inactive' ? 'selected' : '' }} value="inactive">
                {{lang('inactive')}}
            </option>
        </select>
    </div>
    <div class="col">
        <label>{{lang('city')}}</label>
        <select class="form-control" id="region" name="filter[region]" onchange="changeDistrict(this);">
            <option value="">{{lang('select')}}</option>
            @foreach (getRegions() as $item)
                <option {{ request()->input('filter.region') == $item['id'] ? 'selected' : '' }} value="{{$item['id']}}">
                    {{json_decode($item['title'], true)[config('global.lang')]}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <label>{{lang('district')}}</label>
        <select class="form-control" name="filter[district]">
            <option value="">{{lang('select')}}</option>
            @foreach (getDistricts() as $item)
                <option {{ request()->input('filter.district') == $item['id'] ? 'selected' : '' }} data-parent="{{$item['city_id']}}" value="{{$item['id']}}" style="display:none;">
                    {{json_decode($item['title'], true)[config('global.lang')]}}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 mt-4 text-right">
        <a class="btn btn-sm btn-danger col-1 mt-auto {{request()->input('filter')?'':'d-none'}}" href="{{route('admin.list_users')}}"><i class="tim-icons icon-simple-remove"></i></a>
        <button class="btn btn-sm btn-success col-1 mt-auto" type="submit">{{lang('search')}}</button>
    </div>
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
                <th>{{lang('phone')}}</th>
                <th>{{lang('inn')}}</th>
                <th>{{lang('conclusions')}}</th>
                <th>{{lang('transactions_log')}}</th>            
                <th>{{lang('show')}}</th>
            </thead>
            </tbody>
            @foreach ($users as $user)
            <tr>
                <td>
                    @if ($user->status=='active')
                        <span class="badge badge-success">
                            {{ $user->id }}
                        </span>
                    @else
                        <span class="badge badge-danger">
                            {{ $user->id }}
                        </span>
                    @endif
                </td>
                <td>{{ $user->fullname }}</td>
                <td>{{ $user->funds }}</td>
                <td>
                    <span class="badge badge-info">
                        {{ lang($user->group->name) }}    
                    </span>
                </td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->inn }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="{{ route('admin.user_conclusions', [$user->group->name, $user->id]) }}">{{lang('show_user_c')}}</a></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('admin.transactions_log', [$user->id]) }}">{{lang('show_user_t')}}</a>
                </td>
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('admin.view_user', $user->id) }}">
                        {{lang('show')}}
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
{{-- @section('additional_js')
<script>
    $(".filters").select2();
		$("select").on("change", function() {
			$(this).parents('form:first').submit()
		})
</script>
    
@endsection --}}