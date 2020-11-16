+998<input type="text" id="phone" placeholder="Your phone please">
<div class="ver_area" style="display: none">
	<input type="text" placeholder="Your verification please" onkeyup="test_code(this)">
</div>
<button onclick="send_verification()">Send verification</button>


<form action="{{route('forgot_pswrd')}}" id="pswrd_form" method="POST" style="display: none;">
	@csrf
	<input type="hidden" name="ver_code" id="ver_code">
	<input type="hidden" name="phone" id="real_phone">
	New password:
	<input type="password" placeholder="New password please" name="password">
	<button>Submit</button>
</form>

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
			document.getLEem
			form.style.display="block";
			document.getElementById("real_phone").value=phone;
			document.getElementById("ver_code").value=verification_hash;
		}
	}
</script>