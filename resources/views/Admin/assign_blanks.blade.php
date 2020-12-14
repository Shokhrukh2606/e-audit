
<div class="card">
	<div class="card-header">
		<h3>{{ lang('assign_blanks') }}</h3>
	</div>
	<div class="card-body">
		<input type="checkbox" id="check_all" onchange="check_all(this)"
		>
		<label for="check_all">{{lang('check_all')}}</label>
		<hr>
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
			<h4>{{lang("Available Blanks")}}</h4>
			@foreach($blanks as $blank)
			    <div class="form-group">
	                <input 
	                type="checkbox" 
	                value="{{$blank->id}}"
	                name="blank[{{$blank->id}}]"
	                class="blank_check"
	                >
	                <label>{{lang("Blank Nomer")}} {{$blank->id}}</label>
	                <br>
                </div>
			@endforeach
			<button class="btn btn-info btn-simple">{{lang("Assign")}}</button>
		</form>
	</div>
</div>
@section('additional_js')
<script>
	const blank_checks=document.getElementsByClassName('blank_check');
	function check_all(elem){
		if(elem.checked){
			for(let i=0;i<blank_checks.length;i++){
				blank_checks[i].checked=true;
			}
			return 0;
		}
		for(let i=0;i<blank_checks.length;i++){
			blank_checks[i].checked=false;
		}
	}
</script>
@endsection