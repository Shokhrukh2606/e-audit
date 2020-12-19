<div class="card">
	<div class="card-header">
		
	</div>
	<div class="card-body">
		

		<form  id="regForm" action="{{route('agent.edit_conclusion', $conclusion->id)}}" method="POST" enctype="multipart/form-data">
				@csrf
				
				

			<div id="wrapper">
				@if($conclusion->is_coefficent=='with_coef')
				<div id="coefs">
				<div class="kps">
					<label>{{lang('A2')}}</label>
					<input class="form-control" type="number" name="conclusion[A2]" onkeyup="kps()" onchange="copy_A2(this)" id="A2_source" value="{{$conclusion->A2}}">
				</div>
				<div class="kps">
					<label>{{lang('P2')}}</label>
					<input class="form-control" type="number" name="conclusion[P2]" onkeyup="kps()" value="{{$conclusion->P2}}">
				</div>
				<div class="kps">
					<label>{{lang('DO')}}</label>
					<input class="form-control" type="number" name="conclusion[DO]" onkeyup="kps()" value="{{$conclusion->DO}}">
				</div>
				<div class="result-wrapper">
					<span>коэффициент платежеспособности:</span>
					<div class="result" id='kps-result'>
						Result
					</div>
				</div>
				<div class="osos">
					<label>{{lang("P1")}}</label>
					<input class="form-control" type="number" name="conclusion[P1]" onkeyup="osos()" value="{{$conclusion->P1}}">
}}">
				</div>
				<div class="osos">
					<label>{{lang("DEK2")}}</label>
					<input class="form-control" type="number" name="conclusion[DEK2]" onkeyup="osos()" value="{{$conclusion->A2}}">
				</div>
				<div class="osos">
					<label>{{lang("A1")}}</label>
					<input class="form-control" type="number" name="conclusion[A1]" onkeyup="osos()" value="{{$conclusion->A1}}">
				</div>
				<div class="osos">
					<label>{{lang("A2")}}</label>
					<div id="A2"></div>
				</div>
				<div class="result-wrapper">
					<span>Коэффициент обеспеченности собственными оборотными средсвами:</span>
					<div class="result" id='osos-result'>
						Result
					</div>
				</div>
				<div class="kpp">
					<label>{{lang('PUDN')}}</label>
					<input class="form-control" type="number" name="conclusion[PUDN]" onkeyup="kpp()" value="{{$conclusion->PUDN}}">
				</div>
				<div class="kpp">
					<label>{{lang('P')}}</label>
					<input class="form-control" type="number" name="conclusion[P]" onkeyup="kpp()" value="{{$conclusion->P}}">
				</div>
				<div class="result-wrapper">
					<span>Крр:</span>
					<div class="result" id='kpp-result'>
						Result
					</div>
				</div>
				</div>
				@endif
			</div>
			<div class='file-wrapper mb-4'>
				<div class="form-group">
					<p>
						{{lang('cust_comp_director_passport_copy')}}
						<a href="{{route('file')."?path=".$conclusion->cust_info->cust_comp_gov_registration_copy}}"
							class="btn btn-link btn-danger"
						>
							
							{{lang('show')}}

						</a>
					</p>
					<div class="custom-file">
						<input type="file" 
						name="cust_info[cust_comp_director_passport_copy]" 
						class="custom-file-input" 
						id="cust_comp_director_passport_copy">
						<label class="custom-file-label" 
						for="cust_comp_director_passport_copy" data-browse="{{lang('upload')}}">
						{{lang('cust_comp_director_passport_copy')}}
					</label>
				</div>
				<div class="form-group">
					<p>
						{{lang('cust_comp_gov_registration_copy')}}

						<a href="{{route('file')."?path=".$conclusion->cust_info->cust_comp_gov_registration_copy}}"
							class="btn btn-link btn-danger"
						>
							
							{{lang('show')}}

						</a>
					</p>
					<div class="custom-file">
						<input type="file" 
						name="cust_info[cust_comp_gov_registration_copy]" 
						class="custom-file-input" id="cust_comp_gov_registration_copy">
						<label class="custom-file-label" for="cust_comp_gov_registration_copy" data-browse="{{lang('upload')}}">
							{{lang('cust_comp_gov_registration_copy')}}
						</label>
					</div>
				</div>
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
						$link=$dom->createElement("a",lang('show'));
						
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
				<button class="btn btn-sm btn-success">Save</button>
			</form>

	</div>

</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script>
	$(document).on('change', '.custom-file-input', function(event) {
		$(this).next('.custom-file-label').html(event.target.files[0].name);
	})

</script>

<script script src="{{asset('assets/js/againMultistep.js')}}">
</script>
<script src="{{asset('assets/js/coefficient.js')}}"></script>
