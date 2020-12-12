<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>{{lang('contract_no')}}</th>
				<th>{{lang('conclusion_id')}}</th>
				<th>{{lang('show')}}</th>
			</thead>
			<tbody>
				@foreach($contracts as $contract)
					<tr>
						<td>{{$contract->id}}</td>
						<td>{{$contract->conclusion_id}}</td>
						<td>
							<a href="#" class="btn btn-info btn-simple">
							{{lang('show')}}
							</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>