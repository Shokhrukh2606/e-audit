@section('createOrderCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
@endsection

<div class="card">
	<div class="card-header">
		<h3>{{lang('newOrder')}}</h3>
	</div>
	<div class="card-body">
		<form action="{{route('customer.create_order')}}" method="POST" enctype="multipart/form-data">
			@csrf
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul style="padding-left: 0;margin-bottom: 0">
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<div class="tab">
				<h4>1. {{lang('basicInfo')}}</h4>
				<input type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
				@foreach($use_cases as $use_case=>$value)
				<input class="form-control" type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
				@endforeach
				<div class="mb-4">
					<label>{{lang('lang')}}</label>
					<select class="form-control" name="cust_info[lang]">
						<option value="uz">{{lang('uz')}}</option>
						<option value="ru">{{lang('ru')}}</option>
					</select>
				</div>

				<div class="mb-4">
					<label>{{lang('structuredPhone')}}</label>
					<input class="form-control" type="text" minlength="12" maxlength="12" name="order[phone]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('deliverAddress')}}</label>
					<input class="form-control" type="text" name="order[address_to_deliver]" required>
				</div>
			</div>
			<div class="tab">
				<h4>2. {{lang('custCompInfo')}}</h4>
				<div class="mb-4">
					<label>{{ lang('cust_comp_name') }}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_name]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('cust_comp_gov_reg_num')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('userCompGovRegDate')}}</label>
					<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompAddress')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_address]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompBank')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('cust_comp_bank_acc')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]" maxlength="20" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompBankMfo')}}</label>
					<input maxlength="5" class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompInn')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_inn]" maxlength="9" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompOked')}}</label>
					<input maxlength="5" class="form-control" type="text" name="cust_info[cust_comp_oked]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompDirector')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_director_name]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompActivity')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_activity]" required>
				</div>
			</div>
			<div class="tab">
				<h4>3. {{lang('requiredDocs')}}</h4>
				<div class="file-wrapper mb-4">
					@php
					$dom = new DOMDocument('1.0');
					@endphp
					@foreach(custom_fields($template_id) as $index=>$field)
					@php
					$div= $dom->createElement("div");
					$dom->appendChild($div);

					$label = $dom->createElement("label", $field->label->uz.":");
					if($field->type=='file'){
					$allowed_types=$field->allowed_types;
					$label=$dom->createElement("label", lang($field->label->uz)." ($allowed_types):");
					}
					$div->appendChild($label);

					$input = $dom->createElement($field->tag);

					$required=$dom->createAttribute('required');
					$required->value="true";
					$input->appendChild($required);

					$attr = $dom->createAttribute('type');
					$attr->value = $field->type;

					$input->appendChild($attr);

					$attr = $dom->createAttribute('name');
					$attr->value = "custom[$field->name]";
					$input->appendChild($attr);

					if($field->type=='file'){
					$class=$dom->createAttribute('class');
					$class->value="custom-file-input";
					$id=$dom->createAttribute('id');
					$id->value=$index;
					$input->appendChild($id);
					$input->appendChild($class);

					$allowed_types=$dom->createAttribute('accept');
					$allowed_types->value=$field->allowed_types;
					$input->appendChild($allowed_types);

					$wrapper=$dom->createElement('div');

					$class=$dom->createAttribute('class');
					$class->value="custom-file";
					$wrapper->appendChild($class);

					$inLabel=$dom->createElement('label');

					$browse=$dom->createAttribute('data-browse');
					$browse->value=lang('upload');
					$class=$dom->createAttribute('class');
					$class->value="custom-file-label";
					$for=$dom->createAttribute('for');
					$for->value=$index;

					$inLabel->appendChild($for);
					$inLabel->appendChild($browse);
					$inLabel->appendChild($class);

					$wrapper->appendChild($input);
					$wrapper->appendChild($inLabel);

					$div->appendChild($wrapper);
					continue;
					}
					$div->appendChild($input);

					@endphp
					@endforeach
					<?= $dom->saveHTML() ?>
				</div>
				<input type="hidden" name="send_to_admin" id="send_to_admin" value="false">

			</div>
			<div style="overflow:auto;">
				<div style="float:right;">
					<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-sm btn-primary">{{lang('previous')}}</button>
					<button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-sm btn-primary" data-html="{{lang('next')}}" data-customer='hidden' data-submit='hello'>{{lang('next')}}</button>
					<button onclick="no_admin(event)" class="btn btn-sm btn-finish btn-primary" type="submit">{{lang('saveDraft')}}</button>
					<button class="btn btn-sm btn-finish btn-primary" type="submit" onclick="admin(event)">{{lang('saveAndSubmit')}}</button>
				</div>
			</div>
			<!-- Circles which indicates the steps of the form: -->
			<div style="text-align:center;margin-top:40px;">
				<span class="step"></span>
				<span class="step"></span>
				<span class="step"></span>
			</div>
		</form>

	</div>
</div>
@section('createOrderJs')
<script>
	function admin(e) {
		document.getElementById("send_to_admin").value = "true";
	}

	function no_admin(e) {
		document.getElementById("send_to_admin").value = "false";
	}
</script>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/multistep.js')}}"></script>
<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})
</script>
@endsection