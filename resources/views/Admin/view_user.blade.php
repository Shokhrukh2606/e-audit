<form action="{{route('admin.view_user', ['id'=>$user->id])}}" method="POST">
    @csrf

    <label>First Name</label>
    <input class="form-control" type="text" name="user[name]" value="{{$user->name}}"><br>

    <label>Surname</label>
    <input class="form-control" type="text" name="user[surname]" value="{{$user->surname}}"><br>

    <label>Patronymic</label>
    <input class="form-control" type="text" name="user[patronymic]" value="{{$user->patronymic}}"><br>

    <label>Phone</label>
    <input class="form-control" type="text" name="user[phone]" value="{{$user->phone}}"><br>

    <label>Passport Serial Number</label>
    <input class="form-control" type="text" name="user[passport_number]" value="{{$user->passport_number}}"><br>

    <label>Certificate number</label>
    <input class="form-control" type="text" name="user[cert_number]" value="{{$user->cert_number}}"><br>

    <label>Certificate date</label>
    <input class="form-control" type="date" name="user[cert_date]" value="{{$user->cert_date}}"><br>

    <label>Region</label>
    <input class="form-control" type="text" name="user[region]" value="{{$user->region}}"><br>

    <label>District</label>
    <input class="form-control" type="text" name="user[district]" value="{{$user->district}}"><br>

    <label>Address</label>
    <input class="form-control" type="text" name="user[address]" value="{{$user->address}}"><br>

    <label>Password</label>
    <input class="form-control" type="text" name="user[password]"><br>

    <label>Role</label>
    <select class="form-control" name="user[group_id]" }}>
        <option value="">Role</option>
        @foreach ($groups as $item)
        <option value="{{ $item->id }}" {{$user->group_id == $item->id ? 'selected' : '' }}>
            {{ $item->name }}</option>
        @endforeach
    </select><br>
    <button class="btn btn-sm btn-success" type="submit">Save</button>
</form>