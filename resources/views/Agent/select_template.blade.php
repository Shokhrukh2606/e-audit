<form action="{{route('agent.create_conclusion')}}">
	<div>
		Please select template:
		<select name="template_id" required onchange="alter_use_cases(this)">
			@foreach($templates as $template)
			<option value="{{$template->id}}">{{$template->standart_num}}</option>
			@endforeach
		</select>
	</div>
	<div>
		Please select use case:
		<div id="use_cases">
			@foreach($use_cases as $use_case)
			<div data-value="{{$use_case->id}}" data-temp_id="{{$use_case->template_id}}">
				<input type="checkbox" name="use_cases[{{$use_case->id}}]" class="uc">
				{{json_decode($use_case->title)->uz}}
			</div>
			@endforeach
		</div>
	</div>
	<button type="submit">Continue</button>
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