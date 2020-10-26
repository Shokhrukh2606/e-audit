@php
	$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields"];
	$editable_status=['initiated', 'rewrite'];
@endphp
<h2>Order {{$order->id}}</h2>
Status: {{$order->status}} <br>
Details: <br>
{{-- Order info --}}
<h3>Order info</h3>
<ul>
	<li>Template Standart Number:{{$order->cust_info->template->standart_num}}</li>	
	<li>Use Cases: 
		@foreach($order->cust_info->use_cases as $uc)
			<span>{{json_decode($uc->title)->ru}}</span> | 
		@endforeach
	</li>
	@foreach($order->getAttributes() as $key=>$value)
		@continue(in_array($key, $not_iterated, TRUE))
		<li>{{$key}}:{{$value}}</li>
	@endforeach
</ul>
{{-- Customer info --}}
<h3>Customer info</h3>
<ul>
	@foreach($order->cust_info->getAttributes() as $key=>$value)
		@continue(in_array($key, $not_iterated, TRUE))
		<li>{{$key}}:{{$value}}</li>
	@endforeach
	@php
		// get custom fields array
		$custom_fields=json_decode($order->cust_info->custom_fields??"[]");
	@endphp
	{{-- get custom fields meta and iterate --}}

	@foreach(custom_fields($order->cust_info->template_id) as $field)

		<li>
			{{$field->label->ru}} : 
			@if(!isset($custom_fields->{$field->name}))
				Nothing yet
				@continue
			@endif 
			@if($field->type=='file')
				<a href="{{route('file')."?path=".$custom_fields->{$field->name} }}" 
				   target="blank">
					View
				</a>
			@else
				{{$custom_fields->{$field->name} }}
			@endif
		</li>
	@endforeach
</ul>
@if($order->status=='initiated')
	<a href="{{route('customer.cancel_order', $order->id)}}">Delete</a>
@endif
@if(in_array($order->status, $editable_status))
	<a href="{{route('customer.edit_order', $order->id)}}">Edit</a>
	<a href="{{route('customer.send', $order->id)}}">Send to auditor</a>
@endif