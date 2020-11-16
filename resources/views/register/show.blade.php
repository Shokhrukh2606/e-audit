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
            <a href="{{route('forgot_pswrd')}}">Forgot Password</a>
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
                        <input  type="text" class="form-control" placeholder="{{__("auth.Name")}}" value="" name="name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Surname")}}" value="" name="surname" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{__("auth.Patronymic")}}" value="" name="patronymic" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <span>+998</span>
                        <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{__("auth.Phone number")}}" value="" name="phone" />
                      </div>

                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{__("auth.Password")}}" value="" name="password" />
                      </div>
                       <div class="form-group ver_area" style="display: none;" >
                        <input type="text" 
                        placeholder="Please enter verification code" 
                        class="form-control" 
                        
                        onkeyup="test_code(this)"
                        >
            </div>
                      <!-- <input type="submit" class="btnRegister" value="Register" /> -->
                      <button type="button" class="btnRegister" onclick="send_verification()">
                        {{__("auth.Register")}}
                      </button>

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
                        <input type="text" class="form-control" placeholder="{{__("auth.Patronymic")}}" value="" name="patronymic" />
                      </div>
                      <div class="form-group">
                        <span>+998</span>
                        <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{__("auth.Phone number")}}" value="" name="phone" />
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
                      <div class="form-group ver_area" style="display: none;" >
                        <input type="text" 
                        placeholder="Please enter verification code" 
                        class="form-control" 
                        
                        onkeyup="test_code(this)"
                        >
            </div>
                      <button type="button" class="btnRegister" onclick="send_verification()">
                        {{__("auth.Register")}}
                      </button>
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
  <script src="{{asset('md5.js')}}"></script>
  <script>
    const verification_url="{{route('verification')}}";
    const customer=document.getElementById('home');
    const agent=document.getElementById('profile');
    var verification_hash="{{md5("av")}}";
    function send_verification(){
      var phone="";
      if(customer.style.display!='none'){
        phone_input=customer.getElementsByClassName('phone')[0];
      }else{
        phone_input=agent.getElementsByClassName('phone')[0];
      }
      
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
      let form;
      if(customer.style.display!='none'){
        form=customer.getElementsByTagName('form')[0];
      }else{
        form=agent.getElementsByTagName('form')[0];
      }
      var input=document.createElement('input');

      if(MD5(elem.value)==verification_hash){
        input.hidden="true";
        input.value=verification_hash;
        input.name="ver_code";
        form.appendChild(input);  
        form.submit();
      }
    }
  </script>
</body>

</html>
