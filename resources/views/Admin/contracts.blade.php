<div class="card">
	<div class="card-body">
		<table class="table">
			<thead>
				<th>{{lang('id')}}</th>
				<th>{{lang('conclusion_id')}}</th>
				<th>{{lang('user')}}</th>
				<th>{{lang('role')}}</th>
				<th>{{lang('show')}}</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($contracts as $key=>$contract)
                   <tr>
                     <td>{{$contract->id}}</td>
                     <td>{{$contract->conclusion_id}}</td>
                     <td>{{$contract->user->full_name}}</td>
                     <td>{{
                     	lang(
                     	  $contract->user->group->name
                        )
                     }}</td>
                     <td>
                     	<a href="{{route('admin.contracts_view', $contract->id)}}" class="btn btn-link btn-danger">
                     		{{lang('show')}}
                     	</a>
                     </td>
                   </tr>
				@endforeach
			</tbody>			
		</table>
	</div>
</div>