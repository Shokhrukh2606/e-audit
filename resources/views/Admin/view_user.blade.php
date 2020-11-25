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
<form action="{{route('admin.view_user', ['id'=>$user->id])}}" method="POST">
    @csrf

    <label>{{lang('name')}}</label>
    <input class="form-control" type="text" name="user[name]" value="{{$user->name}}"><br>

    <label>{{lang('surname')}}</label>
    <input class="form-control" type="text" name="user[surname]" value="{{$user->surname}}"><br>

    <label>{{lang('userPatronymic')}}</label>
    <input class="form-control" type="text" name="user[patronymic]" value="{{$user->patronymic}}"><br>

    <label>{{lang('phone')}}</label>
    <input class="form-control" type="text" name="user[phone]" value="{{$user->phone}}"><br>

    <label>{{lang('passportSeries')}}</label>
    <input class="form-control" type="text" name="user[passport_number]" value="{{$user->passport_number}}"><br>

    <label>{{lang('sertificateNumber')}}</label>
    <input class="form-control" type="text" name="user[cert_number]" value="{{$user->cert_number}}"><br>

    <label>{{lang('certificateDate')}}</label>
    <input class="form-control" type="date" name="user[cert_date]" value="{{$user->cert_date}}"><br>

    <label>{{lang('city')}}</label>
    <select class="form-control" id="region" name="user[region]" onchange="changeDistrict(this);">
        <option>{{lang('select')}}</option>
        @foreach (getRegions() as $item)
            <option value="{{$item['id']}}">
                {{json_decode($item['title'], true)[config('global.lang')]}}
            </option>
        @endforeach
    </select>
    
    <label>{{lang('district')}}</label>
    <select class="form-control" name="user[district]">
        <option>{{lang('select')}}</option>
        @foreach (getDistricts() as $item)
            <option  data-parent="{{$item['city_id']}}" value="{{$item['id']}}" style="display:none;">
                {{json_decode($item['title'], true)[config('global.lang')]}}
            </option>
        @endforeach
    </select>

    <label>{{lang('addressLine')}}</label>
    <input class="form-control" type="text" name="user[address]" value="{{$user->address}}"><br>

    <label>{{lang('password')}}</label>
    <input class="form-control" type="text" name="user[password]"><br>

    <label>{{lang('role')}}</label>
    <select class="form-control" name="user[group_id]" }}>
        <option value="">{{lang('role')}}</option>
        @foreach ($groups as $item)
        <option value="{{ $item->id }}" {!!$user->group_id == $item->id ? 'selected' : '' !!}>
            {{ lang($item->name) }}</option>
        @endforeach
    </select><br>
    <label>{{lang('status')}}</label>
    <select class="form-control" name="user[status]" }}>
        <option value="">{{lang('status')}}</option>
        <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>{{lang('active')}}</option>
        <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>{{lang('inactive')}}</option>
    </select><br>

    <button class="btn btn-sm btn-success" type="submit">{{lang('save')}}</button>
</form>