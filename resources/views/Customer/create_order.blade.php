@section('createOrderCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
<style>
	.quarters option:disabled {
		color: #9c9c9c;
	}
	.switch input{
		width:initial;
	}
</style>
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
					<label>{{lang('year')}}</label>
					<select class="form-control" name="cust_info[year]" id="year">
					</select>
				</div>
				<div class="mb-4">
					<input type="checkbox" id="yearly" 
					onchange="_yearly(this)"
					style="width:initial"
					>
					<label for="yearly"
					style="font-size:18px"
					>{{lang('yearly')}}</label>
				</div>
				<div id="quarters">
					<div class="mb-4">
						<label>{{lang('quarter_start')}}</label>
						<select class="form-control quarters" name="cust_info[quarter_start]" id="quarterStart" onchange='getInitialQuarter()'>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
					<div class="mb-4">
						<label>{{lang('quarter_finish')}}</label>
						<select class="form-control quarters" name="cust_info[quarter_finish]" id="quarterFinish">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</div>
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
					<label>{{lang('custCompInn')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_inn]" maxlength="9" required>
				</div>
				<div class="switch">
					<p>{{lang('zakazchik')}}</p>
					<div class="form-group">
						<input type="radio" id="perechislenie" 
						onclick="switchit('on')"
						name="cust_info[contract_type]"
						value="yur"
						>
						<label for="perechislenie">
							{{lang('yurlitso')}}
						</label>
					</div>
					<div class="form-group">
						<input type="radio" id="others"
						onclick="switchit('off')" 
						name="cust_info[contract_type]"
						checked="checked"
						value="fiz"
						>
						<label for="others">
							{{lang('fizlitso')}}
						</label>
					</div>
				</div>
				<div id="switchable">
					<div class="mb-4">
						<label>{{lang('contract_company_name')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_company_name]" required>
					</div>
					<div class="mb-4">
						<label>{{lang('contract_company_inn')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_company_inn]" required>
					</div>
					{{-- <div class="mb-4">
						<label>{{lang('cust_comp_gov_reg_num')}}</label>
						<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]" required>
					</div> --}}
					{{-- <div class="mb-4">
						<label>{{lang('cust_comp_registered_by')}}</label>
						<input class="form-control" type="text" name="cust_info[cust_comp_registered_by]">
					</div>
					<div class="mb-4">
						<label>{{lang('userCompGovRegDate')}}</label>
						<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]" required>
					</div> --}}
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
						<label>{{lang('custCompOked')}}</label>
						<input maxlength="5" class="form-control" type="text" name="cust_info[cust_comp_oked]" required>
					</div>
					<div class="mb-4">
						<label>{{lang('custCompDirector')}}</label>
						<input class="form-control" type="text" name="cust_info[cust_comp_director_name]" required>
					</div>
					{{-- <div class="mb-4">
						<label>{{lang('custCompActivity')}}</label>
						<input class="form-control" type="text" name="cust_info[cust_comp_activity]" required>
					</div> --}}
				</div>
				<div id="fiz">
					<div class="mb-4">
						<label>{{lang('name')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_name]" required>
					</div>
					<div class="mb-4">
						<label>{{lang('passport_serie')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_passport_serie]" required>
					</div>
					<div class="mb-4">
						<label>{{lang('where_given')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_where_given]" required>
					</div>
					<div class="mb-4">
						<label>{{lang('address')}}</label>
						<input class="form-control" type="text" name="cust_info[contract_address]" required>
					</div>
				</div>
			</div>
			<div class="tab">
				<h4>3. {{lang('requiredDocs')}}</h4>
				<div class="form-group">
					<p>
						{{lang('cust_comp_director_passport_copy')}}
					</p>
					<div class="custom-file">
						<input type="file" 
						name="cust_info[cust_comp_director_passport_copy]" 
						class="custom-file-input" 
						id="cust_comp_director_passport_copy">
						<label class="custom-file-label" 
						for="cust_comp_director_passport_copy" data-browse="{{lang('upload')}}">
						{{lang('cust_comp_director_passport_copy')}}
					</label>
				</div>
			</div>
			<div class="form-group">
				<p>
					{{lang('cust_comp_gov_registration_copy')}}
				</p>
				<div class="custom-file">
					<input type="file" 
					name="cust_info[cust_comp_gov_registration_copy]" 
					class="custom-file-input" id="cust_comp_gov_registration_copy">
					<label class="custom-file-label" for="cust_comp_gov_registration_copy" data-browse="{{lang('upload')}}">
						{{lang('cust_comp_gov_registration_copy')}}
					</label>
				</div>
			</div>
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
<script>
	var myselect = document.getElementById("year"),
	startYear = new Date().getFullYear()
	count = 10;

	var switch_state='on';
	const switchable=document.getElementById('switchable');
	const fiz=document.getElementById('fiz');
	const quarters=document.getElementById('quarters');
	const clone=switchable.innerHTML;
	const fizClone=fiz.innerHTML;
	/**
	 * [yearly description]
	 * @param  {[type]} elem [description]
	 * @return void
	 */
	function _yearly(elem){
		if(elem.checked){
			quarters.style.display="none";
			quarters.getElementsByClassName('quarters')[0].value="1";
			quarters.getElementsByClassName('quarters')[1].value="4";
			
		}else{
			quarters.style.display="";
		}
	}
	_yearly(document.getElementById('yearly'));
	/**
	 * [switchit dom manipulation]
	 * @param  {[type]} state [description]
	 * @return void
	 */
	 function switchit(state){
	 	switch_state=state;

	 	if(switch_state=='off'){
	 		switchable.style.display='none';
	 		fiz.style.display="block";
	 		fiz.innerHTML=fizClone;
	 		switchable.innerHTML="";
	 	}

	 	if(switch_state=='on'){
	 		switchable.style.display='block';
	 		fiz.style.display="none";
	 		switchable.innerHTML=clone;
	 		fiz.innerHTML="";
	 	}
	 }
	 switchit(switch_state);

	 (function(select, val, count) {
	 	do {
	 		select.add(new Option(val--, count--), null);
	 	} while (count);
	 })(myselect, startYear, count);

	 function getInitialQuarter() {
	 	const quarterStart = document.getElementById('quarterStart');
	 	const quarterFinish = document.getElementById('quarterFinish');
	 	quarterFinish.value = quarterStart.value;
	 	for (let index = 0; index < quarterStart.value - 1; index++) {
	 		quarterFinish.children[index].disabled = true;
	 	}
	 }
	 getInitialQuarter()
	</script>
	@endsection