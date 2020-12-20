@section('createConcOnOrderCss')
<link href="{{asset('assets/css/multistep.css')}}" rel="stylesheet" />
@endsection
<style>
	#coef{
		display: none;
	}
</style>
<div class="card">
	<div class="card-body">
		
		<div class="tab">
			<h2>{{lang('custInfo')}}</h2>
			
			<form  id="regForm" action="{{route('auditor.edit_conclusion', $conclusion->id)}}" method="POST">
				@csrf
				
				{{-- <div>
					<label>{{lang('conclusion_base')}}</label>
					<input class="form-control" type="text" name="conclusion[conclusion_base]" value="{{$conclusion->conclusion_base}}">
				</div> --}}
			@if($conclusion->is_coef=='with_coef')	
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
				</div>
				<div class="osos">
					<label>{{lang("DEK2")}}</label>
					<input class="form-control" type="number" name="conclusion[DEK2]" onkeyup="osos()" value="{{$conclusion->DEK2}}">
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
			@endif
				<!-- <button class="btn btn-sm btn-success">Save</button> -->
			</form>
		</div>
		
		<div style="overflow:auto;">
			<div style="float:right;">
				<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-sm btn-primary btn-finish">{{lang('previous')}}</button>
				<button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-sm btn-primary btn-finish" data-html="{{lang('next')}}" data-submit="{{lang('save')}}">{{lang('next')}}</button>
			</div>

		</div>
		<!-- Circles which indicates the steps of the form: -->
		<div style="text-align:center;margin-top:40px;">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
		</div>
	</div>
</div>

@section('createConcOnOrderJs')
<script script src="{{asset('assets/js/againMultistep.js')}}">
</script>
<script src="{{asset('assets/js/coefficient.js')}}"></script>
<script>
@if($conclusion->is_coefficent=='with_coef')
init_coef()
@endif
</script>
@endsection
