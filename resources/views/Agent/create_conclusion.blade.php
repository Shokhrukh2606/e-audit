<form action="{{route('agent.create_conclusion')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input class="form-control" type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
	@foreach($use_cases as $use_case=>$value)
		<input type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
	@endforeach

	<div class='mb-4'>
	<label>{{__('front.lang')}}</label>
		<select class="form-control" name="cust_info[lang]">
			<option value="uz">{{__('front.oz')}}</option>
			<option value="ru">{{__('front.ru')}}</option>
		</select>
	</div>
	<div class='mb-4'>
		<label>{{__('front.aduit_comp_name')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_name]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_gov_reg_number')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_gov_reg_num]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_gov_reg_date]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_inn')}}</label>
		<input class="form-control" type="text" maxlength="9" name="conclusion[audit_comp_inn]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_oked')}}</label>
		<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_oked]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_license_num')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_lic]">
	</div>
	<div class='mb-4'>
		<label>{{__("front.audit_comp_license_date")}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_lic_date]">
	</div>
	<div class='mb-4'>
		<label>{{__("front.audit_comp_bank_name")}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_bank_name]">
	</div>
	<div class='mb-4'>
		<label>{{__("front.audit_comp_bank_acc")}}</label>
		<input class="form-control" type="text" maxlength="20" name="conclusion[audit_comp_bank_acc]">
	</div>
	<div class='mb-4'>
		<label>{{__("front.adudit_comp_bank_mfo")}}</label>
		<input class="form-control" type="text" maxlength="5" name="conclusion[audit_comp_bank_mfo]">
	</div>
	<div class='mb-4'>
	<label>{{__('front.audit_comp_direc_name')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_director_name]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_gov_reg_number')}}</label>
		<input class="form-control" type="text" name="conclusion[audit_comp_director_cert_num]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.audit_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="conclusion[audit_comp_director_cert_date]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.conclusion_base')}}</label>
		<input class="form-control" type="text" name="conclusion[conclusion_base]">
	</div>
	<div class='mb-4'>
	<label>{{__('front.cust_comp_gov_reg_num')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_address')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_address]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_name')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_acc')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_mfo')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_inn')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_inn]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_oked')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_oked]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_director_name')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_director_name]">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_activity')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_activity]">
	</div>
	<div class='file-wrapper mb-4'>
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
	<button class="btn btn-success" type="submit">{{__('front.save')}}</button>
</form>