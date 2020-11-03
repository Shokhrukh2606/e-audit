@php
	$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields"];
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
<form action="{{route('auditor.create_conc_on_order', $order->cust_info->id)}}" method="POST">
	@csrf
	<div>
		<label>Audit Company Name</label>
		<input type="text" name="conclusion[audit_comp_name]">
	</div>
	<div>
		<label>Audit Company Government Registration Number</label>
		<input type="text" name="conclusion[audit_comp_gov_reg_num]">
	</div>
	<div>
		<label>Audit Company Government Registration Date</label>
		<input type="date" name="conclusion[audit_comp_gov_reg_date]">
	</div>
	<div>
		<label>Audit Company INN</label>
		<input type="text" maxlength="9" name="conclusion[audit_comp_inn]">
	</div>
	<div>
		<label>Audit Company Government OKED</label>
		<input type="text" maxlength="5" name="conclusion[audit_comp_oked]">
	</div>
	<div>
		<label>Audit Company Licence Number</label>
		<input type="text" name="conclusion[audit_comp_lic]">
	</div>
	<div>
		<label>Audit Company Licence Date</label>
		<input type="date" name="conclusion[audit_comp_lic_date]">
	</div>
	<div>
		<label>Audit Company Bank Name</label>
		<input type="text" name="conclusion[audit_comp_bank_name]">
	</div>
	<div>
		<label>Audit Company Bank Account</label>
		<input type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
	</div>
	<div>
		<label>Audit Company Bank MFO</label>
		<input type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
	</div>
	<div>
		<label>Audit Company Director Name</label>
		<input type="text" name="conclusion[audit_comp_director_name]">
	</div>
	<div>
		<label>Audit Company Director Certificate Number</label>
		<input type="text" name="conclusion[audit_comp_director_cert_num]">
	</div>
	<div>
		<label>Audit Company Director Cert Date</label>
		<input type="date" name="conclusion[audit_comp_director_cert_date]">
	</div>
	<div>
		<label>Conclusion Base</label>
		<input type="text" name="conclusion[conclusion_base]">
	</div>
	<button>Save</button>
</form>