<form action="{{route('customer.edit_order', $order->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	<div class='mb-4'>
		<label>{{__('front.lang')}}</label>
		<select class="form-control"  name="order[lang]">
			<option value="uz" {{$order->lang=='uz'?"selected":""}}>{{__('front.oz')}}</option>
			<option value="ru" {{$order->lang=='ru'?"selected":""}}>{{__('front.ru')}}</option>
		</select>
	</div>
	<div class='mb-4'>
		<label>{{__('front.phone')}}</label>
		<input class="form-control"  type="text" maxlength="13" name="order[phone]" value="{{$order->phone}}">
	</div>
	<div class='mb-4'>
		<label>{{__('front.address_to_deliver')}}</label>
		<input class="form-control"  type="text" name="order[address_to_deliver]" value="{{$order->address_to_deliver}}">
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_gov_reg_num')}}</label>
		<input class="form-control"  type="text" 
			name="cust_info[cust_comp_gov_reg_num]"
			value="{{$order->cust_info->cust_comp_gov_reg_num}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_gov_reg_date')}}</label>
		<input class="form-control"  type="date" name="cust_info[cust_comp_gov_reg_date]"
		value="{{date("Y-m-d",strtotime($order->cust_info->cust_comp_gov_reg_date))}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_address')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_address]"
		value="{{$order->cust_info->cust_comp_address}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_name')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_bank_name]"
			value="{{$order->cust_info->cust_comp_bank_name}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_acc')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_bank_acc]"
			value="{{$order->cust_info->cust_comp_bank_acc}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_bank_mfo')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_bank_mfo]"
			value="{{$order->cust_info->cust_comp_bank_mfo}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_inn')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_inn]"
			value="{{$order->cust_info->cust_comp_inn}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_oked')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_oked]"
			value="{{$order->cust_info->cust_comp_oked}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_director_name')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_director_name]"
			value="{{$order->cust_info->cust_comp_director_name}}"
		>
	</div>
	<div class='mb-4'>
		<label>{{__('front.cust_comp_activity')}}</label>
		<input class="form-control"  type="text" name="cust_info[cust_comp_activity]"
			value="{{$order->cust_info->cust_comp_activity}}"
		>
	</div>
	<div class='file-wrapper mb-4'>
		@php
			$dom = new DOMDocument('1.0');
			$custom_fields=json_decode($order->cust_info->custom_fields);
			
		@endphp
			@foreach(custom_fields($order->cust_info->template_id) as $field)
				@php
				$div= $dom->createElement("div");
				$dom->appendChild($div);

				$label = $dom->createElement("label", $field->label->uz.":");
				
				$input = $dom->createElement($field->tag);
				
				$attr = $dom->createAttribute('type');
				$attr->value = $field->type;
				$input->appendChild($attr);

				if($field->type=='file'){
					$text=$dom->createElement("p","Select anew to replace the file");
					if(isset($custom_fields->{$field->name})){
						$link=$dom->createElement("a","view file");
						$blank=$dom->createAttribute('target');
						$blank->value="blank";
						$link->appendChild($blank);

						$href=$dom->createAttribute("href");
						$href->value=route('file')."?path=".urlencode($custom_fields->{$field->name});
						$link->appendChild($href);

						$text->appendChild($link);
					}
					$div->appendChild($text);
				}else{
					$attr = $dom->createAttribute('value');
					$attr->value = $custom_fields->{$field->name};
					$input->appendChild($attr);
				}
				


				$attr = $dom->createAttribute('name');
				$attr->value = "custom[$field->name]";
				$input->appendChild($attr);

				
				$div->appendChild($label);
				$div->appendChild($input);

				@endphp
			@endforeach
		<?=$dom->saveHTML()?>
	</div>
	<button class="btn btn-sm btn-success" type="submit">{{__('front.save')}}</button>
</form>