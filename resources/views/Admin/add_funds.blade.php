<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Пожалуйста, заполните свои данные
        </h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.add_funds') }}" method="POST">
            @csrf
            <div class="col">
                <label>{{ lang('user') }}</label>
                <select class="filters form-control" name="user_id" style='width: 200px;'>
                    <option value="">{{ lang('select') }}</option>
                    @foreach ($users as $user)
                        <option
                            value="{{ $user->id }}">
                            {{ $user->phone }}
                        </option>
                    @endforeach
                </select>
            </div>
			<div class="col">
				<label>{{ lang('user') }}</label>
				<select class="form-control" name="payment_sys">
					<option value="bank_transfer">Bank Transfer</option>
					<option value="cash">Cash</option>
				</select>
			</div>
			<div class="col">
				<input class="form-control" type="number" step="0.01" placeholder="amount" name="amount">
			</div>
            <button class="btn btn-warning btn-sm pull-right">Save</button>
        </form>
    </div>
</div>
