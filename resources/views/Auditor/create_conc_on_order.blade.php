@section('createConcOnOrderCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
@endsection

<div class="card">
	<div class="card-body">
		<div class="tab">
			@php
			$not_iterated=['id', 'customer_id', 'auditor_id',"conclusion_id","order_id", "template_id", "custom_fields", "message","status"];
			@endphp
			<h2>{{lang('order')}} {{$order->id}}
				<span class="badge badge-info">
					{{config('global.reverted_states')[$order->status]}}
				</span>
			</h2>
			{{-- Order info --}}
			<h3>{{lang('orderDetails')}}</h3>
			<ul>
				<li>{{lang('standartNumber')}}: {{$order->cust_info->template->standart_num}}</li>
				<li>{{lang('for')}}:
					@foreach($order->cust_info->use_cases as $uc)
					<span class="badge badge-danger">
						{{ json_decode($uc->title)->{config('global.lang')} }}
					</span>
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
					Пусто
					@continue
					@endif
					@if($field->type=='file')
					<a href="{{route('file')."?path=".$custom_fields->{$field->name} }}" target="blank" class="btn btn-link btn-info btn-sm">
						{{lang('show')}}
					</a>
					@else
					{{$custom_fields->{$field->name} }}
					@endif
				</li>
				@endforeach
			</ul>
		</div>
		<div class="tab">
			<h2>{{lang('custInfo')}}</h2>

			<form action="{{route('auditor.create_conc_on_order', $order->cust_info->id)}}" method="POST">
				@csrf
				<div>
					<label>{{lang('auditCompName')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_name]">
				</div>
				<div>
					<label>{{lang('auditCompGovNumber')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
				</div>
				<div>
					<label>{{lang('auditCompLicenseDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
				</div>
				<div>
					<label>{{lang('auditCompInn')}}</label>
					<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
				</div>
				<div>
					<label>{{lang('auditCompOked')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
				</div>
				<div>
					<label>{{lang('auditCompLicense')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
				</div>
				<div>
					<label>{{lang('auditCompLicenseDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
				</div>
				<div>
					<label>{{lang('auditCompBank')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
				</div>
				<div>
					<label>{{lang('auditCompBankAccount')}}</label>
					<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
				</div>
				<div>
					<label>{{lang('auditCompBankMfo')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
				</div>
				<div>
					<label>{{lang('auditCompDirector')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
				</div>
				<div>
					<label>{{lang('auditCompDirectorLicenseNum')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
				</div>
				<div>
					<label>{{lang('auditCompDirectorLicenseDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
				</div>
				<div>
					<label>{{lang('basicConclusions')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]">
				</div>
				<!-- <button class="btn btn-sm btn-success">Save</button> -->
			</form>
		</div>
		<div class="tab">
			<h2>{{lang('custInfo')}}</h2>
		</div>
		<div style="overflow:auto;">
			<div style="float:right;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-sm btn-primary btn-finish">{{lang('previous')}}</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-sm btn-primary btn-finish" data-html="{{lang('next')}}" data-submit="{{lang('submit')}}">{{lang('next')}}</button>
			</div>

		</div>
		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		</div>
	</div>
</div>

@section('createConcOnOrderJs')
<script script src="{{asset('assets/js/againMultistep.js')}}">
</script>
@endsection