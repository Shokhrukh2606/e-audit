<form action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
	@foreach($use_cases as $use_case=>$value)
		<input type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
	@endforeach

	<div>
		<label>Language</label>
		<select name="cust_info[lang]">
			<option value="uz">Uzbek</option>
			<option value="ru">Russian</option>
		</select>
	</div>
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
	<div>
		<label>Customer Company Government Registration Number</label>
		<input type="text" name="cust_info[cust_comp_gov_reg_num]">
	</div>
	<div>
		<label>Customer Company Government Registration Date</label>
		<input type="date" name="cust_info[cust_comp_gov_reg_date]">
	</div>
	<div>
		<label>Customer Company Address</label>
		<input type="text" name="cust_info[cust_comp_address]">
	</div>
	<div>
		<label>Customer Company Bank Name</label>
		<input type="text" name="cust_info[cust_comp_bank_name]">
	</div>
	<div>
		<label>Customer Company Bank Account</label>
		<input type="text" name="cust_info[cust_comp_bank_acc]">
	</div>
	<div>
		<label>Customer Company Bank MFO</label>
		<input type="text" name="cust_info[cust_comp_bank_mfo]">
	</div>
	<div>
		<label>Customer Company INN</label>
		<input type="text" name="cust_info[cust_comp_inn]">
	</div>
	<div>
		<label>Customer Company OKED</label>
		<input type="text" name="cust_info[cust_comp_oked]">
	</div>
	<div>
		<label>Customer Company Director Name</label>
		<input type="text" name="cust_info[cust_comp_director_name]">
	</div>
	<div>
		<label>Customer Company Activity</label>
		<input type="text" name="cust_info[cust_comp_activity]">
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
	<button type="submit">Submit</button>
</form>