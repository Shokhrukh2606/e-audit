@php
$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields"];
$editable_status=['initiated', 'rewrite'];
@endphp
<h2>{{lang('order')}} {{$order->id}}</h2>
{{lang('status')}}: {{__('front.'.$order->status)}} <br>
{{lang('details')}}: <br>
{{-- Order info --}}
<h3>{{lang('orderDetails')}}</h3>
<ul>
	<li>{{lang('standartNumber')}}:{{$order->cust_info->template->standart_num}}</li>
	<li>{{lang('useCases')}}:
		@foreach($order->cust_info->use_cases as $uc)
		<span>{{lang(json_decode($uc->title)->ru)}}</span>
		@endforeach
	</li>
	@foreach($order->getAttributes() as $key=>$value)
	@continue(in_array($key, $not_iterated, TRUE))
	<li>{{lang($key)}}: {{$value}}</li>
	@endforeach
</ul>
{{-- Customer info --}}
<h3>{{lang('custInfo')}}</h3>
<ul>
	@foreach($order->cust_info->getAttributes() as $key=>$value)
	@continue(in_array($key, $not_iterated, TRUE))
	<li>{{lang($key)}}: {{$value}}</li>
	@endforeach
	@php
	// get custom fields array
	$custom_fields=json_decode($order->cust_info->custom_fields??"[]");
	@endphp
	{{-- get custom fields meta and iterate --}}

	@foreach(custom_fields($order->cust_info->template_id) as $field)

	<li>
		{{lang($field->label->ru)}} :
		@if(!isset($custom_fields->{$field->name}))
		{{__('front.nothing_yet')}}
		@continue
		@endif
		@if($field->type=='file')
		<a href="{{route('file')."?path=".$custom_fields->{$field->name} }}" target="blank">
			{{lang('show')}}
		</a>
		@else
		{{$custom_fields->{$field->name} }}
		@endif
	</li>
	@endforeach
</ul>
@if($order->status=='initiated')
<a href="{{route('customer.cancel_order', $order->id)}}" class="btn btn-fill btn-primary">{{__('custom.delete')}}</a>
@endif
@if(in_array($order->status, $editable_status))
<a href="{{route('customer.edit_order', $order->id)}}" class="btn btn-fill btn-primary">{{__('custom.edit')}}</a>
<a href="{{route('customer.send', $order->id)}}" class="btn btn-fill btn-primary">{{__('front.send_to_auditor')}}</a>
@endif