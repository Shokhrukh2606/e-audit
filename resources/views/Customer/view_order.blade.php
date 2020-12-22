@php
$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields","cust_comp_registered_by",
"cust_comp_gov_reg_num","cust_comp_director_name","contract_name","contract_passport_serie","contract_where_given","contract_address","contract_company_name","contract_company_inn","contract_type","cust_comp_activity","contract_fiz_inn"]
;
$files=['cust_comp_gov_registration_copy', 'cust_comp_director_passport_copy'];
$editable_status=[1, 5];
@endphp

<div class="card">
	<div class="card-header">
		<h2>{{__('front.order')}} {{$order->id}}
			<span class="badge badge-info">
				{{$states[$order->status]}}
			</span>
		</h2>
	</div>
	<div class="card-body">

		<h3>{{lang('orderDetails')}}</h3>
		<ul>
			<li>{{lang('standartNumber')}}:{{$order->cust_info->template->standart_num}}</li>	
			<li>{{__('front.use_cases')}}: 
				@foreach($order->cust_info->use_cases as $uc)
				<span class="badge badge-danger">
					{{lang(json_decode($uc->title)->{config('global.lang')} )}}
				</span>
				@endforeach
			</li>
			@foreach($order->getAttributes() as $key=>$value)
			@if($key=='status')
				<li>{{lang($key)}}: status_{{$value}}</li>
				@continue(true)
			@endif
			@continue(in_array($key, $not_iterated, TRUE))
				<li>{{lang($key)}} :{{$value}}</li>

			@endforeach
		</ul>
		{{-- Customer info --}}
		<h3>{{lang('custInfo')}}</h3>
		<ul>
			@foreach($order->cust_info->getAttributes() as $key=>$value)
			@continue(in_array($key, $not_iterated, TRUE))

			<li>{{lang($key)}} :
			@if(in_array($key, $files, true))
				<a href="{{route('file')."?path=".$value}}" target="blank"
				class="btn btn-primary btn-link"
				>
					{{lang('show')}}
				</a>
			@else
				{{$value}}
			@endif
			</li>
			
			@endforeach
			@php
		// get custom fields array
			$custom_fields=json_decode($order->cust_info->custom_fields??"[]");
			@endphp
			{{-- get custom fields meta and iterate --}}


			@foreach(custom_fields($order->cust_info->template_id) as $field)

			<li>
				{{lang($field->label->{config('global.lang')} )}}: 
				@if(!isset($custom_fields->{$field->name}))
				{{__('front.nothing_yet')}}
				@continue
				@endif 
				@if($field->type=='file')
				<a href="{{route('file')."?path=".$custom_fields->{$field->name} }}" 	class="btn btn-primary btn-link"
					target="blank">
					{{lang('show')}}
				</a>
				@else
				{{$custom_fields->{$field->name} }}
				@endif
			</li>
			@endforeach
		</ul>
		<h3>{{lang('paying_info')}}</h3>
		<ul>
			@if($order->cust_info->contract_type=='yur')
			<li>
				{{lang('contract_company_name')}}: {{$order->cust_info->contract_company_name}}
			</li>
			<li>
				{{lang('contract_company_inn')}}: {{$order->cust_info->contract_company_inn}}
			</li>
			@else
               <li>
				{{lang('contract_where_given')}}: {{$order->cust_info->contract_where_given}}
			</li>
			<li>
				{{lang('contract_address')}}: {{$order->cust_info->contract_address}}
			</li>
			<li>
				{{lang('contract_name')}}: {{$order->cust_info->contract_name}}
			</li>
			@endif
		</ul>
		@if($order->status=='1')
		<a href="{{route('customer.cancel_order', $order->id)}}" class="btn btn-fill btn-danger btn-sm">
			{{__('custom.delete')}}
		</a>
		@endif
		@if($order->status==5)
		<h4>Аудитор обнаружил в вашем заказе следующую ошибку.Пожалуйста, отредактируйте и отправьте аудитору. </h4>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>
				{{$order->message}}
			</strong>
		</div>


		@endif
		@if(in_array($order->status, $editable_status))
		<a href="{{route('customer.edit_order', $order->id)}}" class="btn btn-simple btn-success btn-sm">
			редактировать
		</a>
		@endif
		@if($order->status==1)
		<a href="{{route('customer.send', $order->id)}}" class="btn btn-fill btn-info  btn-sm">
			{{__('front.send_to_auditor')}}
		</a>
		@endif
		@if($order->status==5)
		<a href="{{route('customer.resend', $order->id)}}" class="btn btn-fill btn-info btn-sm">
			Отправить заново
		</a>
		@endif
	</div>
</div>

