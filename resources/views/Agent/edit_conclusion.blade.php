<div class="card">
	<div class="card-header">
		
	</div>
	<div class="card-body">
		

		<form action="{{route('agent.edit_conclusion', $conclusion->id)}}" method="POST" enctype="multipart/form-data">
			@csrf
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<div class='mb-4'>
				<label>{{__('front.lang')}}</label>
				<select class="form-control"  name="cust_info[lang]">
					<option value="uz" {{$conclusion->lang=='uz'?"selected":""}}>{{__('front.oz')}}</option>
					<option value="ru" {{$conclusion->lang=='ru'?"selected":""}}>{{__('front.ru')}}</option>
				</select>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_gov_reg_num')}}</label>
				<input class="form-control"  type="text" 
				name="cust_info[cust_comp_gov_reg_num]"
				value="{{$conclusion->cust_info->cust_comp_gov_reg_num}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_gov_reg_date')}}</label>
				<input class="form-control"  type="date" name="cust_info[cust_comp_gov_reg_date]"
				value="{{date("Y-m-d",strtotime($conclusion->cust_info->cust_comp_gov_reg_date))}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_address')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_address]"
				value="{{$conclusion->cust_info->cust_comp_address}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_bank_name')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_bank_name]"
				value="{{$conclusion->cust_info->cust_comp_bank_name}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_bank_acc')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_bank_acc]"
				value="{{$conclusion->cust_info->cust_comp_bank_acc}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_bank_mfo')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_bank_mfo]"
				value="{{$conclusion->cust_info->cust_comp_bank_mfo}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_inn')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_inn]"
				value="{{$conclusion->cust_info->cust_comp_inn}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_oked')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_oked]"
				value="{{$conclusion->cust_info->cust_comp_oked}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_director_name')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_director_name]"
				value="{{$conclusion->cust_info->cust_comp_director_name}}"
				>
			</div>
			<div class='mb-4'>
				<label>{{__('front.cust_comp_activity')}}</label>
				<input class="form-control"  type="text" name="cust_info[cust_comp_activity]"
				value="{{$conclusion->cust_info->cust_comp_activity}}"
				>
			</div>
			<div class='file-wrapper mb-4'>
				@php
				$dom = new DOMDocument('1.0');
				$custom_fields=json_decode($conclusion->cust_info->custom_fields);

				@endphp
				@foreach(custom_fields($conclusion->cust_info->template_id) as $index=>$field)
				@php
				$div= $dom->createElement("div");
				$dom->appendChild($div);

				$label = $dom->createElement("label", $field->label->uz.":");
				if($field->type=='file'){
						$allowed_types=$field->allowed_types;
						$label=$dom->createElement("label", $field->label->uz." ($allowed_types):");
				}
				$input = $dom->createElement($field->tag);
				
				$attr = $dom->createAttribute('type');
				$attr->value = $field->type;
				$input->appendChild($attr);

				if($field->type=='file'){
					$text=$dom->createElement("p","Пожалуйста, выберите новый файл, чтобы заменить этот файл ");
					if(isset($custom_fields->{$field->name})){
						$link=$dom->createElement("a","просмотреть файл");
						
						$class=$dom->createAttribute('class');
						$class->value="btn btn-primary btn-link";
						$link->appendChild($class);

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

				if($field->type=='file'){
						$class=$dom->createAttribute('class');
						$class->value="custom-file-input";
						$id=$dom->createAttribute('id');
						$id->value=$index;
						$input->appendChild($id);
						$input->appendChild($class);
						
						$allowed_types=$dom->createAttribute('appect');
						$allowed_types->value=$field->allowed_types;
						$input->appendChild($allowed_types);

						$wrapper=$dom->createElement('div');
						
						$class=$dom->createAttribute('class');
						$class->value="custom-file";
						$wrapper->appendChild($class);
						
						$inLabel=$dom->createElement('label');
						
						$browse=$dom->createAttribute('data-browse');
						$browse->value=$field->label->uz;
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
				<?=$dom->saveHTML()?>
			</div>
			<button class="btn btn-sm btn-danger" type="submit">{{__('front.save')}}</button>
		</form>

	</div>

</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{asset('assets/js/multistep.js')}}"></script>
<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})

</script>