<!-- <form action="{{route('customer.create_order')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
	@foreach($use_cases as $use_case=>$value)
	<input class="form-control" type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
	@endforeach
	<div class="mb-4">
		<label>{{__('front.lang')}}</label>
		<select class="form-control" name="cust_info[lang]">
			<option value="uz">{{__('front.oz')}}</option>
			<option value="ru">{{__('front.ru')}}</option>
		</select>
	</div>

	<div class="mb-4">
		<label>{{__('front.phone')}}</label>
		<input class="form-control" type="text" maxlength="13" name="order[phone]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.address_to_deliver')}}</label>
		<input class="form-control" type="text" name="order[address_to_deliver]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_gov_reg_num')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_gov_reg_date')}}</label>
		<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_address')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_address]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_bank_name')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_bank_acc')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_bank_mfo')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_inn')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_inn]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_oked')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_oked]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_director_name')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_director_name]" required>
	</div>
	<div class="mb-4">
		<label>{{__('front.cust_comp_activity')}}</label>
		<input class="form-control" type="text" name="cust_info[cust_comp_activity]" required>
	</div>
	<div class="file-wrapper mb-4">
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
	<button class="btn btn-sm btn-success" type="submit">{{__('custom.create')}}</button>
</form> -->

<form action="{{route('customer.create_order')}}" method="POST" enctype="multipart/form-data">
	<div class="tab">
		<h2>Conclusions</h2>
		<input type="hidden" name="cust_info[template_id]" value="{{$template_id}}">
		@foreach($use_cases as $use_case=>$value)
		<input class="form-control" type="hidden" name="ciucm[{{$use_case}}]" value="{{$use_case}}">
		@endforeach
		<div class="mb-4">
			<label>{{__('front.lang')}}</label>
			<select class="form-control" name="cust_info[lang]">
				<option value="uz">{{__('front.oz')}}</option>
				<option value="ru">{{__('front.ru')}}</option>
			</select>
		</div>

		<div class="mb-4">
			<label>{{__('front.phone')}}</label>
			<input class="form-control" type="text" maxlength="13" name="order[phone]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.address_to_deliver')}}</label>
			<input class="form-control" type="text" name="order[address_to_deliver]" required>
		</div>
	</div>
	<div class="tab">
		<h2>Customer Information</h2>
		<div class="mb-4">
			<label>{{__('front.cust_comp_gov_reg_num')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_gov_reg_num]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_gov_reg_date')}}</label>
			<input class="form-control" type="date" name="cust_info[cust_comp_gov_reg_date]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_address')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_address]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_bank_name')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_name]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_bank_acc')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_acc]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_bank_mfo')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_bank_mfo]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_inn')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_inn]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_oked')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_oked]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_director_name')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_director_name]" required>
		</div>
		<div class="mb-4">
			<label>{{__('front.cust_comp_activity')}}</label>
			<input class="form-control" type="text" name="cust_info[cust_comp_activity]" required>
		</div>
	</div>
	<div class="tab">
		<div class="file-wrapper mb-4">
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