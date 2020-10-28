<table>
	<thead>
		<th>ID</th>
		<th>Customer</th>
		<th>Template</th>
		<th>Use Cases</th>
		<th>Action</th>
	</thead>
	<tbody>

		@foreach($orders as $order)
		<td>{{$order->id}}</td>
		<td>{{$order->customer->name}}</td>
		<td>{{$order->cust_info->template_id}}</td>
		<td>
			@foreach($order->cust_info->use_cases as $uc)
			  <span>{{json_decode($uc->title)->ru}}</span> | 
			@endforeach
		</td>
		<td>
			<a href="{{route('auditor.view_order', $order->id)}}">More</a>
		</td>
		@endforeach
	</tbody>
</table>