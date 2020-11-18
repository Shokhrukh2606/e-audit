<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			{{lang('fillData')}}
		</h3>
	</div>
	<div class="card-body">
        <form action="{{route("admin.create_user")}}" method="POST">
            @csrf
            
            <label>{{lang('name')}}</label>
            <input class="form-control" type="text" name="user[name]"><br>
            
            <label>{{lang('surname')}}</label>
            <input class="form-control" type="text" name="user[surname]"><br>
            
            <label>{{lang('userPatronymic')}}</label>
            <input class="form-control" type="text" name="user[patronymic]"><br>
            
            <label>{{lang('phone')}}</label>
            <input class="form-control" type="text" name="user[phone]"><br>
        
            <label>{{lang('passportSeries')}}</label>
            <input class="form-control" type="text" name="user[passport_number]"><br>
        
            <label>{{lang('sertificateNumber')}}</label>
            <input class="form-control" type="text" name="user[cert_number]"><br>
        
            <label>{{lang('certificateDate')}}</label>
            <input class="form-control" type="date" name="user[cert_date]"><br>
        
            <label>{{lang('city')}}</label>
            <input class="form-control" type="text" name="user[region]"><br>
            
            <label>{{lang('district')}}</label>
            <input class="form-control" type="text" name="user[district]"><br>
        
            <label>{{lang('addressLine')}}</label>
            <input class="form-control" type="text" name="user[address]"><br>
        
            <label>{{lang('password')}}</label>
            <input class="form-control" type="text" name="user[password]"><br>
        
            <label>{{lang('role')}}</label>
            <select class="form-control" name="user[group_id]"}}>
                <option value="">{{lang('role')}}</option>
                @foreach ($groups as $item)
                    <option value="{{ $item->id }}" {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                        {{ lang($item->name) }}</option>
                @endforeach
            </select><br>
            <button class="btn btn-sm btn-success" type="submit">{{lang('save')}}</button>
        </form>
	</div>
</div>