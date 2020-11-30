@php 
use Illuminate\Support\Facades\Schema;
$passable=['id', 'active'];
$limiter=['audit_comp_inn'=>9, 'audit_comp_oked'=>5,
	'audit_comp_bank_acc'=>20, 'audit_comp_bank_mfo'=>5
];
$date=[
		'audit_comp_gov_reg_date',
		'audit_comp_director_cert_date', 
		'audit_comp_lic_date'
	];

$columns=Schema::getColumnListing('audit_comp_info');
@endphp

<div class="card">
	<div class="card-header">
		<h4>Create new Audit Company info cards	</h4>
	</div>
	<div class="card-body">
		<form action="{{url()->current()}}" method="POST">
			@csrf
			@foreach($columns as $column)
			@continue(in_array($column, $passable, true))
			<div class="form-group">
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
				required
				@if($limiter[$column]??false)
				  maxlength="{{$limiter[$column]}}" 
				@endif
				>
			</div>
			@endforeach
			<button class="btn btn-danger btn-sm">
				{{lang('save')}}
			</button>
		</form>
	</div>
</div>