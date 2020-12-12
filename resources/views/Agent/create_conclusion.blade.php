@section('createConclusionCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
<style>
	.quarters option:disabled {
		color: #9c9c9c;
	}
</style>
@endsection

<div class="card">
	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul style="padding-left: 0;margin-bottom: 0">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<form id="regForm" action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
			@foreach($use_cases as $use_case=>$value)
			<input class="form-control" type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
			@endforeach
			<!-- One "tab" for each step in the form: -->
			<div class="tab">
				<h2>{{lang('conclusion')}}</h2>
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
					<label>{{lang('conclusion_base')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]">
				</div>
			</div>
			<div class="tab">
				<h2>{{lang('custInfo')}}</h2>
				<div class="mb-4">
					<label>{{ lang('cust_comp_name') }}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_name]" required>
				</div>
				<div class="mb-4">
					<label>{{lang('custCompInn')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_inn]" maxlength="9" required>
				</div>
				
			</div>
			<div class="tab">
				<h2>{{lang('custInfo')}}</h2>
				<input type="radio" name="conclusion[is_coefficent]" value="no_coef" onclick="change_coef('off')" id="no_coef" style="width:10px">
			<label for="#">{{lang('no_coef')}}</label><br>
			<input type="radio" name="conclusion[is_coefficent]" value="with_coef" onclick="change_coef('on')" id="with_coef" style="width:10px">
			<label for="#">{{lang('with_coef')}}</label>
		
				
				<div>
					<label>{{lang('conclusion_base')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]">
				</div>
			<div id="wrapper">
				<div id="coefs">
				<div class="kps">
					<label>{{lang('A2')}}</label>
					<input class="form-control" type="number" name="conclusion[A2]" onkeyup="kps()" onchange="copy_A2(this)" id="A2_source">
				</div>
				<div class="kps">
					<label>{{lang('P2')}}</label>
					<input class="form-control" type="number" name="conclusion[P2]" onkeyup="kps()">
				</div>
				<div class="kps">
					<label>{{lang('DO')}}</label>
					<input class="form-control" type="number" name="conclusion[DO]" onkeyup="kps()">
				</div>
				<div class="result-wrapper">
					<span>коэффициент платежеспособности:</span>
					<div class="result" id='kps-result'>
						Result
					</div>
				</div>
				<div class="osos">
					<label>{{lang("P1")}}</label>
					<input class="form-control" type="number" name="conclusion[P1]" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>{{lang("DEK2")}}</label>
					<input class="form-control" type="number" name="conclusion[DEK2]" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>{{lang("A1")}}</label>
					<input class="form-control" type="number" name="conclusion[A1]" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>{{lang("A2")}}</label>
					<div id="A2"></div>
				</div>
				<div class="result-wrapper">
					<span>Коэффициент обеспеченности собственными оборотными средсвами:</span>
					<div class="result" id='osos-result'>
						Result
					</div>
				</div>
				<div class="kpp">
					<label>{{lang('PUDN')}}</label>
					<input class="form-control" type="number" name="conclusion[PUDN]" onkeyup="kpp()">
				</div>
				<div class="kpp">
					<label>{{lang('P')}}</label>
					<input class="form-control" type="number" name="conclusion[P]" onkeyup="kpp()">
				</div>
				<div class="result-wrapper">
					<span>Крр:</span>
					<div class="result" id='kpp-result'>
						Result
					</div>
				</div>
				</div>
			</div>
				
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
	</form>
</div>
</div>

@section('createConclusionJs')
<script script src="{{asset('assets/js/againMultistep.js')}}">
</script>
<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})
</script>
<script src="{{asset('assets/js/coefficient.js')}}"></script>
<script>
	var myselect = document.getElementById("year"),
	startYear = new Date().getFullYear()
	count = 10;

	
	const quarters=document.getElementById('quarters');
	
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
	<script>
	const wrap=document.getElementById('wrapper');
	const coef=document.getElementById('coefs');
	const clone=coef.cloneNode(true);
	wrapper.innerHTML="";
	function change_coef(state){
		if(state=='on'){
			wrapper.appendChild(clone);
			init_coef()
		}else{
			wrapper.innerHTML="";
		}
	}
</script>
	@endsection