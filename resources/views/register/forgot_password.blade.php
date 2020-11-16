<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<style>
	.forgot-pswrd{
		background-color: deepskyblue;
		min-height: 100vh;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.inner{
		display: inline-block;
		background-color: white;
		padding:40px 50px;
		border-radius: 10px;
	}
</style>

<div class="forgot-pswrd">
	<div class="inner">
		<label>+998</label>
		<input type="text" id="phone" placeholder="Ваш телефон, пожалуйста">

		<button onclick="send_verification()" class="btn btn-primary">Отправить подтверждение</button>
		<div class="ver_area" style="display: none">
			<input type="text" class="form-control" placeholder="Ваш проверочный код, пожалуйста" onkeyup="test_code(this)" >
		</div>

		<form action="{{route('forgot_pswrd')}}" id="pswrd_form" method="POST" style="display: none;">
			@csrf
			<input type="hidden" name="ver_code" id="ver_code">
			<input type="hidden" name="phone" id="real_phone">
			Новый пароль:
			<input type="password" class="form-control" placeholder="Пожалуйста, введите новый пароль" name="password">
			<button class="btn btn-primary">Сохранить</button>
		</form>
	</div>

</div>
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('md5.js')}}"></script>
<script>
	const verification_url="{{route('verification')}}";
	const phone_input=document.getElementById("phone");
	var verification_hash;
	var phone="";
	function send_verification(){

		if(phone_input.value.length!=9){
			alert('Please enter proper phone number');
			return 0;
		}
		phone="998"+phone_input.value;
		let url=verification_url+"?phone="+encodeURIComponent(phone);

		$.get(url, function(data){
			verification_hash=data;
		})
		open_verification_area();
	}

	function open_verification_area(){
		$(".ver_area").css("display","block");
	}

	function test_code(elem){
		let form=document.getElementById("pswrd_form");
		
		if(MD5(elem.value)==verification_hash){
			form.style.display="block";
			document.getElementById("real_phone").value=phone;
			document.getElementById("ver_code").value=verification_hash;
		}
	}
</script>

