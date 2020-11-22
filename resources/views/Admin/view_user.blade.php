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
    <input class="form-control" type="text" name="user[region]" value="{{$user->region}}"><br>

    <label>{{lang('district')}}</label>
    <input class="form-control" type="text" name="user[district]" value="{{$user->district}}"><br>

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