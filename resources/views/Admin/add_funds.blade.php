





<div class="card">
	<div class="card-header">
		<h3 class="card-title">
			Пожалуйста, заполните свои данные
		</h3>
	</div>
	<div class="card-body">
		<form action="{{route('admin.add_funds')}}" method="POST">
			@csrf
			<select  class="form-control" name="user_id">
				@foreach($users as $user)
					<option value="{{$user->id}}">
						{{$user->name}} {{$user->surname}}
					</option>
				@endforeach
			</select>
			<select  class="form-control" name="payment_sys">
				<option value="bank_transfer">Bank Transfer</option>
				<option value="cash">Cash</option>
			</select>
			<input type="number" step="0.01" placeholder="amount" name="amount">
			<button class="btn btn-warning btn-sm">Save</button>
		</form>
	</div>
</div>