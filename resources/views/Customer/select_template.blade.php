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
		<h3>{{lang('selectTemplate')}}</h3>
	</div>
	<div class="card-body">
		<form action="{{route('customer.create_order')}}">
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
			
		</script>
	</div>
</div>