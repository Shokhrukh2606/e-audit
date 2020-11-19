<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
<!-- Scripti pasda -->

<form action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
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
		<div class='mb-4'>
			<label>{{lang('custCompActivity')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
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

<!-- bu scriptiyam qo'wvoriw kere layout/auditordan o'cirip <script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})
</script> -->
<script src="{{asset('assets/js/multistep.js')}}"></script>