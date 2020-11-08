<div class="card">
    <div class="card-header">
        <h3 class="card-title">My Orders</h3>
    </div>
    <div class="card-body">
		<table class="table tablesorter">
			<thead>
				<th>ID</th>
			<th>{{__('front.customer')}}</th>
				<th>{{__('front.template')}}</th>
				<th>{{__('front.use_cases')}}</th>
				<th>{{__('front.actions')}}</th>
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
					<a href="{{route('auditor.view_order', $order->id)}}">{{__('custom.show')}}</a>
				</td>
				@endforeach
			</tbody>
		</table>
    </div>
</div>

