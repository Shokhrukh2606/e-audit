<div class="card">
	<div class="card-header">
		<h3>Assign blanks</h3>
	</div>
	<div class="card-body">
		<form action="{{url()->current()}}" method="POST">
			@csrf
			<select name="user_id" class="form-control">
				@foreach($users as $user)
                    <option value="{{$user->id}}">
                    	{{$user->full_name}} -
                    	{{$user->group->name}}
                    </option>
				@endforeach
			</select>
			<br>
			<h4>Available Blanks</h4>
			@foreach($blanks as $blank)
			    <div class="form-group">
	                <input 
	                type="checkbox" 
	                value="{{$blank->id}}"
	                name="blank[{{$blank->id}}]"
	                >
	                <label>Blank Nomer {{$blank->id}}</label>
	                <br>
                </div>
			@endforeach
			<button class="btn btn-info btn-simple">Assign</button>
		</form>
	</div>
</div>