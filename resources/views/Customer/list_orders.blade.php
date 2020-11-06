<div class="card">
    <div class="card-header">
		<h3>My Orders</h3>
		<a class="btn btn-sm btn-success" href="{{route('customer.create_order')}}">Create New</a>
    </div>
    <div class="card-body">
        <table class="table tablesorter">
				<thead>
					<th>ID</th>
					<th>Template Standart Number</th>
					<th>Use cases</th>
					<th>Date</th>
					<th>View</th>
					<th>View Conclusion</th>
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
							<a href="{{route('customer.pay', $order->cust_info->conclusion->id)}}">
								Accept and pay
							</a>
							@else
								No conclusion written yet
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
    </div>
</div>

