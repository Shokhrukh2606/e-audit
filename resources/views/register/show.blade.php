<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link href="{{asset('assets/css/register.css')}}" rel="stylesheet" />
  <title>Register</title>
</head>

<body>
  <div class="registration">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <div class="register">
      <div class="container">
        <div class="row">
          <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>Welcome</h3>
            <p>Уже зарегистрированы?</p>
            <a href="{{route("login")}}">Login</a><br />
          </div>
          <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Agent</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">Apply as a User</h3>
                <form method="POST" action="{{ route('reg_cust') }}">
                  @csrf
                  <div class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Name")}}" value="" name="name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Surname")}}" value="" name="surname" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__("auth.Patronymic")}}" value="" name="patronymic" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="{{__("auth.Phone number")}}" value="" name="phone" />
                      </div>

                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__("auth.Password")}}" value="" name="password" />
                      </div>

                      <!-- <input type="submit" class="btnRegister" value="Register" /> -->
                      <button type="submit" class="btnRegister">{{__("auth.Register")}}</button>

                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3 class="register-heading">Apply as a Hirer</h3>
                <form method="POST" action="{{ route('reg_agent') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Name")}}" value="" name="name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Surname")}}" value="" name="surname" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__("auth.Patronymic")}}" value="" name="patronymic" />
                      </div>
                      <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" class="form-control" placeholder="{{__("auth.Phone number")}}" value="" name="phone" />
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__("auth.Password")}}" value="" name="password" />
                      </div>
                      <div class="form-group">
                        <label for="File1">{{__("auth.Passport Copy")}}</label>
                        <input type="file" class="form-control-file" id="File" name="passport_copy">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" max-length="9" placeholder="{{__("auth.Inn")}}" value="" />
                      </div>
                      <div class="form-group">
                        <input type="text" name="cert_number" placeholder="{{__("auth.Certificate Number")}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="date" name="cert_date" placeholder="{{__("auth.Certificate Date")}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="region" placeholder="{{__("auth.Region")}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="district" placeholder="{{__("auth.District")}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="address" placeholder="{{__("auth.Address")}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            {{__("auth.I agree")}}
                          </label>
                        </div>
                      </div>

                      <button type="submit" class="btnRegister">{{__("auth.Register")}}</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="{{asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</body>

</html>
<!-- 
<style>
    .d-none {
        display: none;
    }
</style>
@if ($errors->any())
  <div class="alert alert-danger">
     <ul>
        @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
        @endforeach
     </ul>
  </div>
@endif
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
</script> -->