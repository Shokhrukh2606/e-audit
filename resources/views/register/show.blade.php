<style>
    .d-none {
        display: none;
    }

</style>
<a href="#" class="navigator" data-id="user">{{ __('auth.user') }}</a>
<a href="#" class="navigator" data-id="agent">{{ __('auth.agent') }}</a>
<div class="user d-none" id="user">
    <h1>{{__("auth.Register User")}}</h1>
    <form method="POST" action="{{ route('reg_cust') }}">
        @csrf
        <div>
            <label>{{__("auth.Name")}}</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>{{__("auth.Surname")}}</label>
            <input type="text" name="surname">
        </div>
        <div>
            <label>{{__("auth.Patronymic")}}</label>
            <input type="text" name="patronymic">
        </div>
        <label>{{__("auth.Phone number")}}</label>
        <input type="text" name="phone">
        <div>
            <label>{{__("auth.Password")}}</label>
            <input type="text" name="password">
        </div>
        <button type="submit">{{__("auth.Register")}}</button>
    </form>
</div>


<div class="agent d-none" id="agent">
    <h1>{{__("auth.Register Agent")}}</h1>
    <form method="POST" action="{{ route('reg_agent') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>{{__("auth.Name")}}</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>{{__("auth.Surname")}}</label>
            <input type="text" name="surname">
        </div>
        <div>
            <label>{{__("auth.Patronymic")}}</label>
            <input type="text" name="patronymic">
        </div>
        <div>
            <label>{{__("auth.Phone number")}}</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label>{{__("auth.Passport Number")}}</label>
            <input type="text" maxlength="9" name="passport_number">
        </div>
        <div>
            <label>{{__("auth.Passport Copy")}}</label>
            <input type="file" name="passport_copy">
        </div>
        <div>
            <label>{{__("auth.Inn")}}</label>
            <input type="text" maxlength="9" name="inn">
        </div>
        <div>
            <label>{{__("auth.Certificate Number")}}</label>
            <input type="text" name="cert_number">
        </div>
        <div>
            <label>{{__("auth.Certificate Date")}}</label>
            <input type="date" name="cert_date">
        </div>
        <div>
            <label>{{__("auth.Region")}}</label>
            <input type="text" name="region">
        </div>
        <div>
            <label>{{__("auth.District")}}</label>
            <input type="text" name="district">
        </div>
        <div>
            <label>{{__("auth.Address")}}</label>
            <input type="text" name="address">
        </div>
        <div>
            <label>{{__("auth.Password")}}</label>
            <input type="text" name="password">
        </div>
        <div>
            <label>{{__("auth.I agree")}}</label>
            <input type="checkbox">
        </div>

        <button type="submit">{{__("auth.Register")}}</button>
    </form>
</div>


<script>
var navigators=document.getElementsByClassName("navigator")
for(var i = 0; i < navigators.length; i++) {
  (function(index) {
    navigators[index].addEventListener("click", function(e) {
		e.preventDefault()
	    if(index==0){
			document.getElementById("user").style.display="block"
			document.getElementById("agent").style.display="none"
		}else{
			document.getElementById("user").style.display="none"
			document.getElementById("agent").style.display="block"
		}
     })
  })(i);
}

</script>
