<table>
	<thead>
		<th>ID</th>
		<th>Customer</th>
		<th>Auditor</th>
		<th>Agent</th>
		<th>Standard Number</th>
		<th>View</th>
	</thead>
	<tbody>
		<tr>
			@foreach($conclusions as $conclusion)
				<td>{{$conclusion->id}}</td>
				<td>
					{{$conclusion->customer->name??'No'}}
					{{$conclusion->customer->surname??'Customer'}}
				</td>
				<td>
					{{$conclusion->auditor->name??'No'}}
					{{$conclusion->auditor->surname??'Auditor'}}
				</td>
				<td>
					{{$conclusion->agent->name??'No'}}
					{{$conclusion->agent->surname??'Agent'}}
				</td>
				<td>{{$conclusion->cust_info->template->standart_num}}</td>
				<td><a href="#">View</a></td>
			@endforeach
		</tr>
	</tbody>
</table>