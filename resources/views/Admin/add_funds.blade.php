<form action="{{route('admin.add_funds')}}" method="POST">
	@csrf
	<select name="user_id">
		@foreach($users as $user)
			<option value="{{$user->id}}">
				{{$user->name}} {{$user->surname}}
			</option>
		@endforeach
	</select>
	<select name="payment_sys">
		<option value="bank_transfer">Bank Transfer</option>
		<option value="cash">Cash</option>
	</select>
	<input type="number" step="0.01" placeholder="amount" name="amount">
	<button>Save</button>
</form>