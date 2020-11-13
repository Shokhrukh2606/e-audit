<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			Пожалуйста, заполните данные пользователя
		</h3>
	</div>
	<div class="card-body">
        <form action="{{route("admin.create_user")}}" method="POST">
            @csrf
            
            <label>{{__('front.username')}}</label>
            <input class="form-control" type="text" name="user[name]"><br>
            
            <label>{{__('front.last_name')}}</label>
            <input class="form-control" type="text" name="user[surname]"><br>
            
            <label>{{__('front.middle_name')}}</label>
            <input class="form-control" type="text" name="user[patronymic]"><br>
            
            <label>{{__('front.phone')}}</label>
            <input class="form-control" type="text" name="user[phone]"><br>
        
            <label>{{__('front.p_ser')}}</label>
            <input class="form-control" type="text" name="user[passport_number]"><br>
        
            <label>{{__('front.cer_number')}}</label>
            <input class="form-control" type="text" name="user[cert_number]"><br>
        
            <label>{{__('front.cer_date')}}</label>
            <input class="form-control" type="date" name="user[cert_date]"><br>
        
            <label>{{__('front.region')}}</label>
            <input class="form-control" type="text" name="user[region]"><br>
            
            <label>{{__('front.district')}}</label>
            <input class="form-control" type="text" name="user[district]"><br>
        
            <label>{{__('front.address_permanent')}}</label>
            <input class="form-control" type="text" name="user[address]"><br>
        
            <label>{{__('front.password')}}</label>
            <input class="form-control" type="text" name="user[password]"><br>
        
            <label>{{__('front.role')}}</label>
            <select class="form-control" name="user[group_id]"}}>
                <option value="">{{__('front.role')}}</option>
                @foreach ($groups as $item)
                    <option value="{{ $item->id }}" {{ request()->input('filter.group_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}</option>
                @endforeach
            </select><br>
            <button class="btn btn-sm btn-success" type="submit">{{__('front.save')}}</button>
        </form>
	</div>
</div>