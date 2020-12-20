@php 
use Illuminate\Support\Facades\Schema;
$passable=['id', 'active'];
$limiter=['audit_comp_inn'=>9, 'audit_comp_oked'=>5,
'audit_comp_bank_acc'=>20, 'audit_comp_bank_mfo'=>5
];
$date=[
	'audit_comp_gov_reg_date',
	'audit_comp_director_cert_date', 
	'audit_comp_lic_date',
	'auditor_cert_date'
];

$columns=Schema::getColumnListing('audit_comp_info');
@endphp
<style>
	.bordered{
		border:1px solid pink;
		border-radius: 10px;
		padding:20px;
		margin:15px 0;
	}
	.bordered form{
		display: inline-block;
		margin:0 0 0 20px;
	}
	.bordered .property{
		color:white;
		font-size: 20px;
	}
</style>
<div class="card">
	<div class="card-header">
		<h3>{{lang('audit_comp_info')}}
			<a href="{{route('admin.create_a_c_i')}}" 
			class="btn btn-sm btn-info">
			+
		</a>
	</h3>

</div>
<div class="card-body">
	@foreach($audit_infos as $info)
	<div class="bordered">
		<div class="row showIt">
			@foreach($columns as $column)
			@continue(in_array($column, $passable, true))
			<div class="col-md-6">
				<p>{{lang($column)}}:
				<div class="property">{{$info->$column}}</div>
				</p>
			</div>
			@endforeach
		</div>
		<form action="{{route('admin.edit_a_c_i', $info->id)}}" 
			method="POST" class="editIt" style="display: none">
			@csrf
			<div class="row">
				@foreach($columns as $column)
				@continue(in_array($column, $passable, true))
				<div class="form-group col-md-6">
					<label for="{{$column}}">
						{{lang($column)}}	
					</label><br>
					<input 
					@if(in_array($column, $date, true))
					type="date"
					@else
					type="text" 
					@endif
					name="{{$column}}" 
					class="form-control"
					@if($limiter[$column]??false)
					maxlength="{{$limiter[$column]}}" 
					@endif
					value="{{$info->$column}}"
					required
					>
				</div>
				@endforeach
			</div>
			<button class="btn btn-primary btn-sm">{{lang('save')}}</button>
			<div class="pull-right">
				<button type="button" class="btn btn-danger btn-sm"
				onclick="editing(this,'off')"
				>
				{{lang('cancel')}}
			</button>
		</div>
	</form>
	<div class="showIt">
		@if($info->active)
		<button class="btn btn-danger btn-simple">
			{{lang('aleady_active')}}
		</button>
		@else
		<a class="btn btn-primary" 
		href="{{route('admin.default_a_c_i', $info->id)}}"
		>
		{{lang('make_default')}}
	</a>
	@endif
	<div class="pull-right ">
		<button class="btn btn-warning btn-sm" onclick="editing(this, 'on')">
			{{lang('edit')}}
		</button>
		@if(!$info->active)
		<form action="{{route('admin.delete_a_c_i', $info->id)}}">
			<button class="btn btn-danger btn-sm">
				{{lang('delete')}}
			</button>
		</form>
		@endif
	</div>
</div>
</div>
@endforeach

</div>
</div>
<script>
	function editing(elem, state){
		if(state=='on'){
			elem.parentNode.parentNode.parentNode.getElementsByClassName('showIt')[0].style.display="none";
			elem.parentNode.parentNode.parentNode.getElementsByClassName('showIt')[1].style.display="none";
			elem.parentNode.parentNode.parentNode.getElementsByClassName('editIt')[0].style.display="block";
		}else{
			elem.parentNode.parentNode.parentNode.getElementsByClassName('showIt')[0].style.display="";
			elem.parentNode.parentNode.parentNode.getElementsByClassName('showIt')[1].style.display="block";
			elem.parentNode.parentNode.parentNode.getElementsByClassName('editIt')[0].style.display="none";
		}
	}
</script>