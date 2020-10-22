<style>
    .d-none {
        display: none;
    }

</style>
<a href="#" class="navigator" data-id="user">Пользователь</a>
<a href="#" class="navigator" data-id="agent">Агент</a>
<div class="user d-none" id="user">
    <h1>Register User</h1>
    <form method="POST" action="{{ route('reg_cust') }}">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Surname</label>
            <input type="text" name="surname">
        </div>
        <div>
            <label>Patronymic</label>
            <input type="text" name="patronymic">
        </div>
        <label>Phone number</label>
        <input type="text" name="phone">
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>
        <button type="submit">Register</button>
    </form>
</div>


<div class="agent d-none" id="agent">
    <h1>Register Agent</h1>
    <form method="POST" action="{{ route('reg_agent') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Surname</label>
            <input type="text" name="surname">
        </div>
        <div>
            <label>Patronymic</label>
            <input type="text" name="patronymic">
        </div>
        <div>
            <label>Phone number</label>
            <input type="text" name="phone">
        </div>
        <div>
            <label>Passport Number</label>
            <input type="text" maxlength="9" name="passport_number">
        </div>
        <div>
            <label>Passport Copy</label>
            <input type="file" name="passport_copy">
        </div>
        <div>
            <label>Inn</label>
            <input type="text" maxlength="9" name="inn">
        </div>
        <div>
            <label>Certificate Number</label>
            <input type="text" name="cert_number">
        </div>
        <div>
            <label>Certificate Date</label>
            <input type="date" name="cert_date">
        </div>
        <div>
            <label>Region</label>
            <input type="text" name="region">
        </div>
        <div>
            <label>District</label>
            <input type="text" name="district">
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password">
        </div>
        <div>
            <label>I agree</label>
            <input type="checkbox">
        </div>

        <button type="submit">Register</button>
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
