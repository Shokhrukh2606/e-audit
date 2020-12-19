<div class="card">
	<div class="card-header">
		<h3>{{ lang('create_blanks') }}</h3>
	</div>
	<div class="card-body">
		<form action="{{url()->current()}}" method="POST">
			@csrf
			<div class="form-group">
				<label for="quantity">{{lang('quantity')}}</label>
				<select name="quantity" class="form-control">
					@for($i=1;$i<11;$i++)
						<option value="{{$i}}">
							{{$i}}
						</option>
					@endfor
					@for($i=20;$i<51;$i=$i+10)
						<option value="{{$i}}">
							{{$i}}
						</option>
					@endfor
				</select>
			
			</div>
			<button class="btn btn-simple btn-success">
				{{ lang('create') }}
			</button>
		</form>
	</div>
</div>