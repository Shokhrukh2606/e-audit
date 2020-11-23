@section('createConclusionCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
@endsection

<div class="card">
	<div class="card-body">

		<form id="regForm" ction="{{route('auditor.create_conclusion')}}" method="POST" enctype="multipart/form-data">
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
				<!-- <div class="mb-4">
					<label>{{lang('year')}}</label>
					<input class="form-control" type="number" name="conclusion[year]">
				</div>
				<div class="mb-4">
					<label>{{lang('quarter_start')}}</label>
					<input class="form-control" type="text" name="conclusion[quarter_start]">
				</div>
				<div class="mb-4">
					<label>{{lang('quarter_finish')}}</label>
					<input class="form-control" type="text" name="conclusion[quarter_finish]">
				</div>
				<div class="mb-4">
					<label>{{lang('companyName')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('companyName')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('cust_comp_gov_reg_num')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
				</div>
				<div class="mb-4">
					<label>{{lang('govRegDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompInn')}}</label>
					<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompOked')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompLicense')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompLicenseDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompBank')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompBankAccount')}}</label>
					<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompBankMfo')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompDirector')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('auditCompGovNumber')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
				</div>
				<div class="mb-4">
					<label>{{lang('govRegDate')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
				</div>
				<div class="mb-4">
					<label>{{lang('basicConclusions')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]">
				</div> -->
			</div>
			<div class="tab">
				<h2>{{lang('custInfo')}}</h2>
				<div class="mb-4">
					<label>{{lang('cust_comp_gov_reg_num')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]">
				</div>
				<!-- <div class="mb-4">
					<label>{{lang('userCompGovRegDate')}}</label>
					<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompAddress')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_address]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompBank')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('cust_comp_bank_acc')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompBankMfo')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompInn')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_inn]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompOked')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_oked]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompDirector')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_director_name]">
				</div>
				<div class="mb-4">
					<label>{{lang('custCompActivity')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
				</div> -->
			</div>
			<div class="tab">
				<h2>{{lang('custInfo')}}</h2>
				<div class="kps">
					<label>{{lang('current_actives')}}</label>
					<input class="form-control" type="number" name="A2" onkeyup="kps()">
				</div>
				<div class="kps">
					<label>{{lang('current_obligation')}}</label>
					<input class="form-control" type="number" name="P2" onkeyup="kps()">
				</div>
				<div class="kps">
					<label>{{lang('long_term_liabilities')}}</label>
					<input class="form-control" type="number" name="D0" onkeyup="kps()">
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
					<input class="form-control" type="number" name="P1" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>Dek2</label>
					<!-- <label>{{lang('sources_of_own_funds')}}</label> -->
					<input class="form-control" type="number" name="DEK2" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>A1</label>
					<!-- <label>{{lang('long_term_loans')}}</label> -->
					<input class="form-control" type="number" name="A1" onkeyup="osos()">
				</div>
				<div class="osos">
					<label>A2</label>
					<!-- <label>{{lang('long_term_actives')}}</label> -->
					<input class="form-control" type="number" name="A2" onkeyup="osos()">
				</div>
				<div class="result-wrapper">
					<span>Коэффициент обеспеченности собственными оборотными средсвами:</span>
					<div class="result" id='osos-result'>
						Result
					</div>
				</div>
				<div class="kpp">
					<label>pudn</label>
					<input class="form-control" type="number" name="PUDN" onkeyup="kpp()">
				</div>
				<div class="kpp">
					<label>p</label>
					<input class="form-control" type="number" name="P" onkeyup="kpp()">
				</div>
				<div class="result-wrapper">
					<span>Крр:</span>
					<div class="result" id='kpp-result'>
						Result
					</div>
				</div>
				<!-- <div>
					<label>{{lang('sources_of_own_funds')}}</label>
					<input class="form-control" type="text" name="conclusion[sources_of_own_funds]">
				</div>
				<div>
					<label>{{lang('long_term_loans')}}</label>
					<input class="form-control" type="text" name="conclusion[long_term_loans]">
				</div> -->
				<div class="files">
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
				<!-- <button class="btn btn-sm btn-success" type="submit">Submit</button> -->
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
<script script src="{{asset('assets/js/multistep.js')}}">
</script>
<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})
</script>
<script src="{{asset('assets/js/coefficient.js')}}"></script>
@endsection

<!-- <script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
		// console.log(document.getElementsByClassName("btn-finish"))
		// This function will display the specified tab of the form...
		var x = document.getElementsByClassName("tab");
		x[n].style.display = "block";
		//... and fix the Previous/Next buttons:
		document.getElementsByClassName("btn-finish")[0].style.display = "none";
		document.getElementsByClassName("btn-finish")[1].style.display = "none";
		if (n == 0) {
			document.getElementById("prevBtn").style.display = "none";
		} else {
			document.getElementById("prevBtn").style.display = "inline";
		}
		if (n == (x.length - 1)) {
			document.getElementById("nextBtn").style.display = "none";
			document.getElementsByClassName("btn-finish")[0].style.display = "inline-block";
			document.getElementsByClassName("btn-finish")[1].style.display = "inline-block";
		}
		//... and run a function that will display the correct step indicator:
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		document.querySelector('.main-panel').scrollTo(0, 0);
		// This function will figure out which tab to display
		var x = document.getElementsByClassName("tab");
		// Exit the function if any field in the current tab is invalid:
		if (n == 1 && !validateForm()) return false;
		// Hide the current tab:
		x[currentTab].style.display = "none";
		// Increase or decrease the current tab by 1:
		currentTab = currentTab + n;
		// if you have reached the end of the form...
		if (currentTab >= x.length) {
			// ... the form gets submitted:

			// document.getElementById("regForm").submit();
			return false;
		}
		// Otherwise, display the correct tab:
		showTab(currentTab);
	}

	function validateForm() {
		// This function deals with validation of the form fields
		var x, y, i, valid = true;
		x = document.getElementsByClassName("tab");
		y = x[currentTab].getElementsByTagName("input");
		// A loop that checks every input field in the current tab:
		for (i = 0; i < y.length; i++) {
			// If a field is empty...
			if (y[i].value == "") {
				// add an "invalid" class to the field:
				y[i].className += " invalid";
				// and set the current valid status to false
				valid = false;
			}
		}
		// If the valid status is true, mark the step as finished and valid:
		if (valid) {
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
		return valid; // return the valid status
	}

	function fixStepIndicator(n) {
		// This function removes the "active" class of all steps...
		var i, x = document.getElementsByClassName("step");
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		//... and adds the "active" class on the current step:
		x[n].className += " active";
	}
</script> -->