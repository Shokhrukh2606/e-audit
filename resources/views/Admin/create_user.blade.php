<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			Пожалуйста, заполните свои данные
		</h3>
	</div>
	<div class="card-body">
        <form action="{{route("admin.create_user")}}" method="POST">
            @csrf
            
            <label>First Name</label>
            <input class="form-control" type="text" name="user[name]"><br>
            
            <label>Surname</label>
            <input class="form-control" type="text" name="user[surname]"><br>
            
            <label>Patronymic</label>
            <input class="form-control" type="text" name="user[patronymic]"><br>
            
            <label>Phone</label>
            <input class="form-control" type="text" name="user[phone]"><br>
        
            <label>Passport Serial Number</label>
            <input class="form-control" type="text" name="user[passport_number]"><br>
        
            <label>Certificate number</label>
            <input class="form-control" type="text" name="user[cert_number]"><br>
        
            <label>Certificate date</label>
            <input class="form-control" type="date" name="user[cert_date]"><br>
        
            <label>Region</label>
            <input class="form-control" type="text" name="user[region]"><br>
            
            <label>District</label>
            <input class="form-control" type="text" name="user[district]"><br>
        
            <label>Address</label>
            <input class="form-control" type="text" name="user[address]"><br>
        
            <label>Password</label>
            <input class="form-control" type="text" name="user[password]"><br>
        
            <label>Role</label>
            <select name="user[group_id]"}}>
                <option value="">Role</option>
                @foreach ($groups as $item)
                    <option value="{{ $item->id }}" {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select><br>
            <button type="submit">Save</button>
        </form>
	</div>
</div>