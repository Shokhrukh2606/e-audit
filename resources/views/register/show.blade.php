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
    @if (session('message'))
    <div class="alert alert-success">
      {{session('message')}}
      @php
        Session::forget('message');
      @endphp
    </div>
    @endif
    <div class="register">
      <div class="container">
        <div class="row">
          <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
            <h3>{{lang('welcome')}}</h3>
            <p>{{lang('registered')}}</p>
            <a href="{{route("login")}}">{{lang('login')}}</a><br />
          </div>
          <div class="col-md-9 register-right">
            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{lang('user')}}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{lang('agent')}}</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">{{lang('asUser')}}</h3>
                <form method="POST" action="{{ route('reg_cust') }}">
                  @csrf
                  <div class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('name')}}" value="" name="name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('surname')}}" value="" name="surname" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('patronymic')}}" value="" name="patronymic" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <!-- <input type="text" class="form-control" placeholder="{{lang('phoneNumber')}}" value="" name="phone" /> -->
                        <!-- <span>+998</span>
                        <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{__("auth.Phone number")}}" value="" name="phone" /> -->
                        <div class="row">
                          <div class="col-2">
                            <div style="height:100%;display: flex;align-items: center;">
                              <span>+998</span>
                            </div >
                          </div>
                          <div class="col">
                            <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{lang('phoneNumber')}}" value="" name="phone" />
                          </div>
                        </div>

                      </div>

                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{lang('password')}}" value="" name="password" />
                      </div>
                      <!-- <div class="form-group ver_area" style="display: none;">
                        <input type="text" placeholder="Please enter verification code" class="form-control" onkeyup="test_code(this)">
                      </div>
                      <button type="submit" class="btnRegister">{{lang('register')}}</button> -->
                      <div class="form-group ver_area" style="display: none;" >
                        <input type="text" 
                        placeholder="Please enter verification code" 
                        class="form-control" 
                        onkeyup="test_code(this)">
                      </div>
                      <!-- <input type="submit" class="btnRegister" value="Register" /> -->

                      <button type="button" class="btnRegister" onclick="send_verification()">{{lang('register')}}</button>

                    </div>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <h3 class="register-heading">{{lang('asAgent')}}</h3>
                <form method="POST" action="{{ route('reg_agent') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('name')}}" value="" name="name" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('surname')}}" value="" name="surname" />
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="{{lang('patronymic')}}" value="" name="patronymic" />
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-2">
                            <div style="height:100%;display: flex;align-items: center;">
                              <span>+998</span>
                            </div >
                          </div>
                          <div class="col">
                            <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{lang('phoneNumber')}}" value="" name="phone" />
                          </div>
                        </div>

                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" placeholder="{{lang('password')}}" value="" name=" password" />
                      </div>
                      <div class="custom-file">
                        <input type="file" name="passport_copy" class="custom-file-input" id="InputFile">
                        <label class="custom-file-label" for="InputFile" data-browse="{{lang('upload')}}">{{lang('passportCopy')}}</label>
                      </div>

                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="text" class="form-control" max-length="9" placeholder="{{lang('inn')}}" value="" />
                      </div>
                      <div class="form-group">
                        <input type="text" name="cert_number" placeholder="{{lang('sertificateNumber')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="date" name="cert_date" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="region" placeholder="{{lang('city')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="district" placeholder="{{lang('district')}}" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="address" placeholder="{{lang('address')}}" class="form-control">
                      </div>

                      <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="gridCheck">
                          <label class="form-check-label" for="gridCheck">
                            {{lang('agree')}}
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
                        {{lang('register')}}
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('md5.js')}}"></script>
  <script>
    const verification_url="{{route('verification')}}";
    const customer=document.getElementById('home');
    const agent=document.getElementById('profile');
    var verification_hash="";

    var phone_input;
    var phone="";
   
    function send_verification(){
     
      if(customer.classList.contains('show')){
        phone_input=customer.getElementsByClassName('phone')[0];
      }else{
        phone_input=agent.getElementsByClassName('phone')[0];
      }

      if(phone_input.value.length!=9){
        console.log(phone_input);
        alert('Please enter proper phone number');
        return 0;
      }
      phone="998"+phone_input.value;
      let url=verification_url+"?phone="+encodeURIComponent(phone);
      
      $.get(url, function(data){
        verification_hash=data;
      });
      open_verification_area();
    } 

    $(document).on('change', '.custom-file-input', function(event) {
      $(this).next('.custom-file-label').html(event.target.files[0].name);
    })

    function open_verification_area(){
      $(".ver_area").css("display","block");
    }

    function test_code(elem){
      let form;
      if(customer.classList.contains('show')){
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