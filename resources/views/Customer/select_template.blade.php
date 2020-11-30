@php
use App\Models\Template;
@endphp
<style>
	label {
		font-size: 14px !important;
	}
</style>
<div class="card">
	<div class="card-header">
		
	</div>
	<div class="card-body">
		<form action="{{route('customer.create_order')}}">
			<input type="hidden" name="template_id" id="template_id">
			<div class="mt-4">
				<h4>{{lang('forWhat')}}</h4>
				<div id="use_cases" class="mt-2">
					@php
						$old_template_id=-1;
					@endphp
					@foreach($use_cases as $use_case)
					@php

						$template_id=$use_case->template_id;
						if($template_id!=$old_template_id)
							echo "<h4>".json_decode(Template::where('id',$template_id)->first()->name)->{config('global.lang')}."</h4>";
						$old_template_id=$template_id;
					@endphp
					<div data-value="{{$use_case->id}}" data-temp_id="{{$use_case->template_id}}">
						<input 
							type="checkbox" 
							name="use_cases[{{$use_case->id}}]" 
							class="uc" 
							id="use_cases[{{$use_case->id}}]"
							data-template_id="{{$use_case->template_id}}"
							onclick="change_temp(this)"
						>
						<label for="use_cases[{{$use_case->id}}]">{{lang(json_decode($use_case->title)->uz)}}</label>
					</div>
					@endforeach
				</div>
			</div>
			<button class="form-control btn btn-primary" type="submit">
				{{lang('continue')}}
			</button>
		</form>
		<script>
			var temp_id;
			const use_cases=document.getElementsByClassName('uc');
			const template_id_input=document.getElementById('template_id');
			function change_temp(elem){
				temp_id=elem.dataset.template_id;
				for(let i=0;i<use_cases.length;i++){
					if(use_cases[i].dataset.template_id!=temp_id){
						use_cases[i].checked=false;
					}

				}
				template_id_input.value=temp_id;
			}
		</script>
	</div>
</div>