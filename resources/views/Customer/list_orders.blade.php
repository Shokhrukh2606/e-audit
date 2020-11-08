
<h3>My Orders</h3>
<table>
	<thead>
		<th>ID</th>
		<th>Template Standart Number</th>
		<th>Use cases</th>
		<th>Date</th>
		<th>View</th>
		<th>View Conclusion</th>
		<th>Accept</th>
		<th>Pay</th>
	</thead>
	<tbody>
		@foreach($orders as $order)
		<tr>
			<td>{{$order->id}}</td>
			<td>{{$order->cust_info->template->standart_num}}</td>
			<td>
				{{-- many to many retrieval --}}
				@foreach($order->cust_info->use_cases as $uc)
				<span>{{json_decode($uc->title)->ru}}</span> | 
				@endforeach
			</td>
			<td>{{$order->created_at}}</td>
			<td>
				<a href="{{route('customer.order_view', $order->id)}}">View</a>
			</td>
			<td>
				@if($order->cust_info->conclusion->id??false)
				<a href="{{route('customer.conclusion', $order->cust_info->conclusion->id)}}">
					View Conclusion
				</a>
				@else
				No conclusion written yet
				@endif
			</td>
			<td>
				@if($order->cust_info->conclusion->id??false)
					@if($order->cust_info->conclusion->invoice??false)
						Already accepted
					@else
					<a href="{{route('customer.create_invoice', $order->cust_info->conclusion->id)}}">
						Accept
					</a>
					@endif
				@else
				No conclusion written yet
				@endif
			</td>
			<td>
				@if($order->cust_info->conclusion->invoice??false)
				<a href="{{route('customer.pay', $order->cust_info->conclusion->invoice->id)}}">
					pay
				</a>
				@else
				Not accepted by you yet
				@endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<a href="{{route('customer.create_order')}}">Create New</a>
