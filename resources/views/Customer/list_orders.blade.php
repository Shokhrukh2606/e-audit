<h3>My Orders</h3>
<table>
	<thead>
		<th>ID</th>
		<th>Template Standart Number</th>
		<th>Use cases</th>
		<th>Date</th>
		<th>More</th>
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
			<td><a href="{{route('customer.order_view', $order->id)}}">More</a></td>
		</tr>
		@endforeach
	</tbody>
</table>