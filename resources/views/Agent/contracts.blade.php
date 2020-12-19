<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>{{lang('ID')}}</th>
				<th>{{lang('show')}}</th>
			</thead>
			<tbody>
				@foreach($contracts as $contract)
				<tr>
					<td>{{$contract->id}}</td>
					<td>
						<a href="{{route('agent.contracts_view',$contract->id)}}">
							{{lang('show')}}
						</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>		
	</div>
</div>