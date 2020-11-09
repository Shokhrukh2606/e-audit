<form action="{{route('auditor.create_conclusion')}}">
	<div>
		{{__('front.select_temp')}}:
		<select class="form-control" name="template_id" required onchange="alter_use_cases(this)">
			@foreach($templates as $template)
			<option value="{{$template->id}}">{{$template->standart_num}}</option>
			@endforeach
		</select>
	</div>
	<div>
		{{__('front.select_use_case')}}:
		<div id="use_cases">
			@foreach($use_cases as $use_case)
			<div data-value="{{$use_case->id}}" data-temp_id="{{$use_case->template_id}}">
				<input class="form-control" type="checkbox" name="use_cases[{{$use_case->id}}]" class="uc">
				{{json_decode($use_case->title)->uz}}
			</div>
			@endforeach
		</div>
	</div>
	<button class="btn btn-sm btn-success" type="submit">{{__('front.continue')}}</button>
</form>
<script>
	function alter_use_cases(elem){
		let value=elem.value;
		let use_cases=document.getElementById("use_cases").children;
		for(use_case_cont of use_cases){
			use_case_cont.style.display="";
			// input is the zero child
			use_case_cont.children[0].checked=false;
			if(use_case_cont.dataset.temp_id!==value){
				use_case_cont.style.display="none";
			}
		}
	}
</script>