@section('createConcCss');
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
<style>
	.quarters option:disabled {
		color: #9c9c9c;
	}
</style>
@endsection

<form id="regForm" action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input class="form-control" type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
	@foreach($use_cases as $use_case=>$value)
	<input type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
	@endforeach

	<div class="tab">
		<h2>{{lang('conclusion')}}</h2>

		<div class='mb-4'>
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
		<div class='mb-4'>
			<label>{{lang('auditCompName')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_name]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompGovNumber')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
		</div>
		<div class='mb-4'>
			<label>{{lang('govRegDate')}}</label>
			<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompInn')}}</label>
			<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompOked')}}</label>
			<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompLicense')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompLicenseDate')}}</label>
			<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompBank')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompBankAccount')}}</label>
			<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompBankMfo')}}</label>
			<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompDirector')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
		</div>
		<div class='mb-4'>
			<label>{{lang('auditCompGovNumber')}}</label>
			<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
		</div>
		<div class='mb-4'>
			<label>{{lang('govRegDate')}}</label>
			<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
		</div>
		<div class='mb-4'>
			<label>{{lang('basicConclusions')}}</label>
			<input class="form-control" type="text" name="conclusion[conclusion_base]">
		</div>
	</div>
	<div class="tab">
		<h2>{{lang('custInfo')}}</h2>
		<div class='mb-4'>
			<label>Custom company registered by</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_registered_by]">
		</div>
		<div class='mb-4'>
			<label>Custom company name</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_name]">
		</div>
		<div class='mb-4'>
			<label>{{lang('cust_comp_gov_reg_num')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]">
		</div>
		<div class='mb-4'>
			<label>{{lang('userCompGovRegDate')}}</label>
			<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompAddress')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_address]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompBank')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]">
		</div>
		<div class='mb-4'>
			<label>{{lang('cust_comp_bank_acc')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompBankMfo')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompInn')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_inn]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompOked')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_oked]">
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompDirector')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_director_name]">
		</div>
		<div class="kps">
			<label>{{lang('current_actives')}}</label>
			<input class="form-control" type="number" name="conclusion[A2]" onkeyup="kps()" onchange="copy_A2(this)" id="A2_source">
		</div>
		<div class="kps">
			<label>{{lang('current_obligation')}}</label>
			<input class="form-control" type="number" name="conclusion[P2]" onkeyup="kps()">
		</div>
		<div class="kps">
			<label>{{lang('long_term_liabilities')}}</label>
			<input class="form-control" type="number" name="conclusion[DO]" onkeyup="kps()">
		</div>
		<div class="result-wrapper">
			<span>коэффициент платежеспособности:</span>
			<div class="result" id='kps-result'>
				Result
			</div>
		</div>
		<div class="osos">
			<label>P1</label>
			<!-- <label>{{lang('long_term_actives')}}</label> -->
			<input class="form-control" type="number" name="conclusion[P1]" onkeyup="osos()">
		</div>
		<div class="osos">
			<label>Dek2</label>
			<!-- <label>{{lang('sources_of_own_funds')}}</label> -->
			<input class="form-control" type="number" name="conclusion[DEK2]" onkeyup="osos()">
		</div>
		<div class="osos">
			<label>A1</label>
			<!-- <label>{{lang('long_term_loans')}}</label> -->
			<input class="form-control" type="number" name="conclusion[A1]" onkeyup="osos()">
		</div>
		<div class="osos">
			<label>A2</label>
			<!-- <label>{{lang('long_term_actives')}}</label> -->
			<div id="A2"></div>
		</div>
		<div class="result-wrapper">
			<span>Коэффициент обеспеченности собственными оборотными средсвами:</span>
			<div class="result" id='osos-result'>
				Result
			</div>
		</div>
		<div class="kpp">
			<label>pudn</label>
			<input class="form-control" type="number" name="conclusion[PUDN]" onkeyup="kpp()">
		</div>
		<div class="kpp">
			<label>p</label>
			<input class="form-control" type="number" name="conclusion[P]" onkeyup="kpp()">
		</div>
		<div class="result-wrapper">
			<span>Крр:</span>
			<div class="result" id='kpp-result'>
				Result
			</div>
		</div>
		<div class='mb-4'>
			<label>{{lang('custCompActivity')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
		</div>
		<div>
			<label>{{lang('current_actives')}}</label>
			<input class="form-control" type="text" name="conclusion[current_actives]">
		</div>
		<div>
			<label>{{lang('current_obligation')}}</label>
			<input class="form-control" type="text" name="conclusion[current_obligation]">
		</div>
		<div>
			<label>{{lang('long_term_liabilities')}}</label>
			<input class="form-control" type="text" name="conclusion[long_term_liabilities]">
		</div>
		<div>
			<label>{{lang('long_term_actives')}}</label>
			<input class="form-control" type="text" name="conclusion[long_term_actives]">
		</div>
		<div>
			<label>{{lang('sources_of_own_funds')}}</label>
			<input class="form-control" type="text" name="conclusion[sources_of_own_funds]">
		</div>
		<div>
			<label>{{lang('long_term_loans')}}</label>
			<input class="form-control" type="text" name="conclusion[long_term_loans]">
		</div>
		<div class="form-group">
			<label>Blank Nomer</label>
			<select name="blank_id" class="form-control" required>
				@foreach($blanks as $blank)
				<option value="{{$blank->id}}">
					Blank {{$blank->id}}
				</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="tab">
		<h2>{{lang('custInfo')}}</h2>

		<div class='file-wrapper mb-4 files'>
			@php
			$dom = new DOMDocument('1.0');
			@endphp
			@foreach(custom_fields($template_id) as $field)
			@php
			$div= $dom->createElement("div");
			$class = $dom->createAttribute('class');
			$class->value = 'custom-file';
			$div->appendChild($class);
			$dom->appendChild($div);

			$input = $dom->createElement($field->tag);

			$attr = $dom->createAttribute('type');
			$attr->value = $field->type;
			$input->appendChild($attr);

			$inputClass = $dom->createAttribute('class');
			$inputClass->value = 'custom-file-input';
			$input->appendChild($inputClass);

			$inputId = $dom->createAttribute('id');
			$inputId->value = 'inputFile';
			$input->appendChild($inputId);

			$attr = $dom->createAttribute('name');
			$attr->value = "custom[$field->name]";
			$input->appendChild($attr);

			$div->appendChild($input);

			$label = $dom->createElement("label", lang($field->label->uz).":");
			$labelClass = $dom->createAttribute('class');
			$labelClass->value = 'custom-file-label';
			$label->appendChild($labelClass);
			$for = $dom->createAttribute('for');
			$for->value = 'inputFile';
			$label->appendChild($for);
			$dataBrowse = $dom->createAttribute('data-browse');
			$dataBrowse->value = lang('upload');
			$label->appendChild($dataBrowse);
			$div->appendChild($label);
			@endphp
			@endforeach
			<?= $dom->saveHTML() ?>
		</div>
	</div>

	<!-- <button class="btn btn-success" type="submit">{{__('front.save')}}</button> -->
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


@section('additional_js')
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
