<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet"/>
<script src="{{asset('assets/js/multistep.js')}}"></script>
<div class="card">
	<div class="card-body">

		<form id="regForm" ction="{{route('auditor.create_conclusion')}}" method="POST" enctype="multipart/form-data">
			<!-- <h1>Register:</h1> -->
			<!-- One "tab" for each step in the form: -->
			<div class="tab">
				<h2>Conclusions</h2>

				<div class="mb-4">
					<label>{{__('front.language')}}</label>
					<select class="form-control" name="cust_info[lang]">
						<option value="uz">Uzbek</option>
						<option value="ru">Russian</option>
					</select>
				</div>

				<div class="mb-4">
					<label>{{__('front.audit_comp_name')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_name]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_gov_reg_number')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_gov_reg_date')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_inn')}}</label>
					<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_oked')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_license_num')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_license_date')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_bank_name')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_bank_acc')}}</label>
					<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
				</div>
				<div class="mb-4">
					<label>{{__('front.adudit_comp_bank_mfo')}}</label>
					<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_direc_name')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_gov_reg_number')}}</label>
					<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
				</div>
				<div class="mb-4">
					<label>{{__('front.audit_comp_gov_reg_date')}}</label>
					<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
				</div>
				<div class="mb-4">
					<label>{{__('front.conclusion_base')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]">
				</div>
			</div>
			<div class="tab">
				<h2>Customer Information</h2>
				<div class="mb-4">
					<label>{{__('front.cust_comp_gov_reg_num')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_gov_reg_date')}}</label>
					<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_address')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_address]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_bank_name')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_bank_acc')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_bank_mfo')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_inn')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_inn]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_oked')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_oked]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_director_name')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_director_name]">
				</div>
				<div class="mb-4">
					<label>{{__('front.cust_comp_activity')}}</label>
					<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
				</div>
			</div>
			<div class="tab">
				<h2>Customer Information</h2>
				<div class="files">
					@php
					$dom = new DOMDocument('1.0');
					@endphp
					@foreach(custom_fields($template_id) as $field)
					@php
					$div= $dom->createElement("div");
					$dom->appendChild($div);
					$label = $dom->createElement("label", $field->label->uz.":");
					$div->appendChild($label);

					$input = $dom->createElement($field->tag);

					$attr = $dom->createAttribute('type');
					$attr->value = $field->type;
					$input->appendChild($attr);
					$attr = $dom->createAttribute('name');
					$attr->value = "custom[$field->name]";
					$input->appendChild($attr);

					$div->appendChild($input);
					@endphp
					@endforeach
					<?= $dom->saveHTML() ?>
				</div>
				<!-- <button class="btn btn-sm btn-success" type="submit">Submit</button> -->
			</div>
			<div style="overflow:auto;">
				<div style="float:right;">
					<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-sm btn-primary">Previous</button>
					<button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-sm btn-primary">Next</button>
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