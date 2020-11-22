<div class="card">
	<div class="card-header">
		<h3 class="card-title">{{lang('myOrders')}}</h3>
	</div>
	<div class="card-body">
		<table class="table tablesorter">
			<thead>
				<th>{{lang('id')}}</th>
				<th>{{lang('customer')}}</th>
				<th>{{lang('template')}}</th>
				<th>{{lang('useCases')}}</th>
				<th>Cтатус</th>
				<th>{{lang('activity')}}</th>
			</thead>
			<tbody>

				@foreach($orders as $order)
				<tr>
				<td>{{$order->id}}</td>
				<td>{{$order->customer->name}}</td>
				<td>{{ $order->cust_info->template->standart_num }}</td>
				<td>
					@foreach($order->cust_info->use_cases as $uc)
					<span class="badge badge-info">
						{{ json_decode($uc->title)->{config('global.lang')} }}
					</span>
					@endforeach
				</td>
				<td>
					<span class="badge badge-danger">
						{{config('global.reverted_states')[$order->status]}}
					</span>
				</td>
				<td>
					<a class="btn btn-sm btn-info" href="{{route('auditor.view_order', $order->id)}}">{{lang('show')}}</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$orders->links()}}
	</div>
</div>