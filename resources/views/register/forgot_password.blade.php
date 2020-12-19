<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/forgot-password.css')}}">
@if(session('message'))
<div class="alert alert-danger">
	<p>{{lang(session('message'))}}</p>
	@php
      Session::forget('message');
    @endphp	
</div>
@endif
<div class="forgot-pswrd">
	<div class="inner">
		<h3 class="mb-4 text-center">{{lang('restorePassword')}}</h3>
		<div class="input-wrapper">
			<label>+998</label>
			<input type="text" id="phone" placeholder="{{lang('phoneNumber')}}">
		</div>

		<button onclick="send_verification()" class="btn btn-primary">{{lang('sendConfirmation')}}</button>
		<div class="ver_area mt-3" style="display: none">
			<input type="text" class="form-control" placeholder="{{lang('verificationCode')}}" onkeyup="test_code(this)">
		</div>

		<form action="{{route('forgot_pswrd')}}" id="pswrd_form" method="POST" style="display: none;" class="mt-3">
			@csrf
			<input type="hidden" name="ver_code" id="ver_code">
			<input type="hidden" name="phone" id="real_phone">
			{{lang('newPassword')}}:
			<input type="password" class="form-control" placeholder="{{lang('typeNewPassword')}}" name="password">
			<button class="btn btn-primary mt-3">{{lang('save')}}</button>
		</form>
	</div>

</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('md5.js')}}"></script>
<script>
	const verification_url = "{{route('verification')}}";
	const phone_input = document.getElementById("phone");
	var verification_hash;
	var phone = "";

	function send_verification() {

		if (phone_input.value.length != 9) {
			alert('Please enter proper phone number');
			return 0;
		}
		phone = "998" + phone_input.value;
		let url = verification_url + "?phone=" + encodeURIComponent(phone);

		$.get(url, function(data) {
			verification_hash = data;
		})
		open_verification_area();
	}

	function open_verification_area() {
		$(".ver_area").css("display", "block");
	}

	function test_code(elem) {
		let form = document.getElementById("pswrd_form");

		
		if (MD5(elem.value) == verification_hash) {
			form.style.display = "block";
			document.getElementById("real_phone").value = phone;
			document.getElementById("ver_code").value = verification_hash;
		}
	}
</script>
<script>
	const inputs = document.querySelectorAll('.forgot-pswrd input');
	for (i = 0; i < inputs.length; i++) {
		if (inputs[i].getAttribute('placeholder')) {
			inputs[i].setAttribute('size', inputs[i].getAttribute('placeholder').length);
		}
	}
</script>