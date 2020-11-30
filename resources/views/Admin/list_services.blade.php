<style>
	.edit{
		display: none;
	}

</style>
<div class="card">
	<div class="card-header">
		<h3>{{ lang('list_services') }}</h3>
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<th>{{lang('title')}}</th>
				<th>{{lang('price')}}</th>
			</thead>
			<tbody>
				@foreach($services as $service)
				<tr>
					<td>
						{{ 
							json_decode($service->service_name)->{config('global.lang')} 
						}}
					</td>
					<td>
						<form 
							action="{{route('admin.edit_service', $service->id)}}" 
							class="edit" 
							method="POST"
						>
						@csrf
							<input type="number" name="price">
							<button class="btn btn-danger btn-fab btn-icon btn-round" onclick="hide_form(this)" type="button">
								<i class="tim-icons icon-simple-remove"></i>
							</button>
							<button class="btn btn-warning btn-fab btn-icon btn-round">
								<i class="tim-icons icon-pencil"></i>
							</button>
						</form>
						<div class="show">
							{{
								$service->price
							}} UZS 

							<button class="btn btn-warning btn-fab btn-icon btn-round" onclick="show_form(this)">
								<i class="tim-icons icon-pencil"></i>
							</button>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<script>
	function show_form(elem){
		const td=elem.parentNode.parentNode;
		td.children[0].style.display="block";
		td.children[1].style.display="none";
	}
	function hide_form(elem){
		const td=elem.parentNode.parentNode;
		td.children[0].style.display="none";
		td.children[1].style.display="block";
	}

</script>