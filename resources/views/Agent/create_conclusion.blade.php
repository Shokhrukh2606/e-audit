<form action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input class="form-control" type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
	@foreach($use_cases as $use_case=>$value)
		<input type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
	@endforeach

	<div>
	<label>{{__('front.language')}}</label>
		<select class="form-control" name="cust_info[lang]">
			<option value="uz">{{__('front.oz')}}</option>
			<option value="ru">{{__('front.ru')}}</option>
		</select>
	</div>
	<div>
		<label>{{__('front.audit_comp_name')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_name]">
	</div>
	<div>
		<label>{{__('front.audit_comp_gov_reg_number')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
	</div>
	<div>
		<label>{{__('front.audit_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
	</div>
	<div>
		<label>{{__('front.audit_comp_inn')}}</label>
		<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
	</div>
	<div>
		<label>{{__('front.audit_comp_oked')}}</label>
		<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
	</div>
	<div>
		<label>{{__('front.audit_comp_license_num')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
	</div>
	<div>
		<label>{{__("front.audit_comp_license_date")}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
	</div>
	<div>
		<label>{{__("front.audit_comp_license_date")}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
	</div>
	<div>
		<label>{{__("front.audit_comp_bank_name")}}</label>
		<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
	</div>
	<div>
		<label>{{__("front.adudit_comp_bank_mfo")}}</label>
		<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
	</div>
	<div>
	<label>{{__('front.audit_comp_direc_name')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
	</div>
	<div>
		<label>{{__('front.audit_comp_gov_reg_number')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
	</div>
	<div>
		<label>{{__('front.audit_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
	</div>
	<div>
		<label>Conclusion Base</label>
		<input class="form-control" type="text" name="conclusion[conclusion_base]">
	</div>
	<div>
		<label>Customer Company Government Registration Number</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]">
	</div>
	<div>
		<label>Customer Company Government Registration Date</label>
		<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]">
	</div>
	<div>
		<label>Customer Company Address</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_address]">
	</div>
	<div>
		<label>Customer Company Bank Name</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]">
	</div>
	<div>
		<label>Customer Company Bank Account</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]">
	</div>
	<div>
		<label>Customer Company Bank MFO</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]">
	</div>
	<div>
		<label>Customer Company INN</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_inn]">
	</div>
	<div>
		<label>Customer Company OKED</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_oked]">
	</div>
	<div>
		<label>Customer Company Director Name</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_director_name]">
	</div>
	<div>
		<label>Customer Company Activity</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
	</div>
	<div>
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
		<?=$dom->saveHTML()?>
	</div>
	<button class="btn btn-success" type="submit">Submit</button>
</form>