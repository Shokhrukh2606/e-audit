<div class="card">
	<div class="card-body">
		
		<table class="table">
			<thead>
				<th>{{lang('invoice_id')}}</th>
				<th>{{lang('pay')}}</th>
			</thead>
			<tbody>
				@foreach($bills as $bill)
				<tr>
					<td>{{$bill->id}}</td>
					<td>
						<a class="btn btn-info btn-sm" href="{{ route('agent.create_invoice', $bill->conclusion->id) }}">
                                    {{ lang('pay') }}
                        </a>
						
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

</div>