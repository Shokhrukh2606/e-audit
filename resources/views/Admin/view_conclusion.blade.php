@php
$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields", "message", "status"];
@endphp
<div class="card">
	<div class="card-header">
		<h2>{{lang('order')}} {{$conclusion->id}}
			<span class="badge badge-danger">
                {{$conclusion->state}}
            </span>
		</h2>
	</div>
	<div class="card-body">
		{{-- Order info --}}
		<h3>{{lang('orderDetails')}}</h3>
		<ul>
			<li>{{lang('standartNumber')}}: {{$conclusion->cust_info->template->standart_num}}</li>
			<li>{{lang('useCases')}}:
				@foreach($conclusion->cust_info->use_cases as $uc)
				<span>{{json_decode($uc->title)->ru}}</span>
				@endforeach
			</li>
			@foreach($conclusion->getAttributes() as $key=>$value)
			@continue(in_array($key, $not_iterated, TRUE))
				<li>{{lang($key)}}: {{$value}}</li>
			@endforeach
		</ul>
		{{-- Customer info --}}
		<h3>{{lang('clientInfo')}}</h3>
		<ul>
			@foreach($conclusion->cust_info->getAttributes() as $key=>$value)
			@continue(in_array($key, $not_iterated, TRUE))
			<li>{{lang($key)}}: {{$value}}</li>
			@endforeach
			@php
	// get custom fields array
			$custom_fields=json_decode($conclusion->cust_info->custom_fields??"[]");
			@endphp
			{{-- get custom fields meta and iterate --}}

			@foreach(custom_fields($conclusion->cust_info->template_id) as $field)

			<li>
				{{$field->label->ru}} :
				@if(!isset($custom_fields->{$field->name}))
				{{__('front.nothing_yet')}}
				@continue
				@endif
				@if($field->type=='file')
				<a class="btn btn-sm btn-info btn-link" 
				href="{{route('file')."?path=".$custom_fields->{$field->name} }}" target="blank"
				>
					{{lang('show')}}
				</a>
				@else
				{{$custom_fields->{$field->name} }}
				@endif
			</li>
			@endforeach

		</ul>
		@if(in_array($conclusion->status, [2]))
			<a href="{{route('admin.change_status', ['finished',$conclusion->id])}}" 
				class="btn btn-success btn-sm btn-simple">
				Подтвердить правильность документов
			</a>
		@endif

	</div>
</div>
<script>
	function send_errors(){
		document.getElementById('errors').submit();
	}
</script>