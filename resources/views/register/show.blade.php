<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link href="{{asset('assets/css/register.css')}}" rel="stylesheet" />
  <title>Register</title>
  <style>
    .eye {
      position: absolute;
      right: 10px;
      bottom: 10px;
      cursor: pointer;
    }

    .eye img {
      width: 20px;
    }
  </style>
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
    <div class="register" onclick="close_langs()">
      <div class="container">
        <div class="row">
          <div class="col-md-3 register-left">
            <div>
              <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
              <h3>{{lang('welcome')}}</h3>
              <p>{{lang('registered')}}</p>
              <a href="{{route("login")}}">{{lang('login')}}</a><br />
            </div>
          </div>
          <div class="col-md-9 register-right">
            <div class="parent">
              <div class="lang">
                <span onclick="langs(event)">
                  {{ config('global.all_langs')[config('global.lang')] }}
                </span>
                <ul id="langs-drop" class="langs-drop">
                  @foreach(config('global.all_langs') as $key=>$lang)
                  @continue($key==config('global.lang'))
                  <li onclick="change_lang(event, '{{$key}}')">
                    {{$lang}}
                  </li>
                  @endforeach
                </ul>
              </div>
              <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{lang('user')}}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{lang('agent')}}</a>
                </li>
              </ul>
            </div>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <h3 class="register-heading">{{lang('asUser')}}</h3>
                <form method="POST" action="{{ route('reg_cust') }}" onsubmit="fixValue()">
                  @csrf
                  <div class="row register-form client">
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
                        <!-- <div class="row">
                          <div class="col-2">
                            <div style="height:100%;display: flex;align-items: center;">
                              <span>+998</span>
                            </div>
                          </div>
                          <div class="col">
                            <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{lang('phoneNumber')}}" value="" name="phone" />
                          </div>
                        </div> -->
                        <div>
                          <label for="phone">{{ lang('phoneNumber') }}</label> <br>
                          <span class="phone">
                            <span id="defaultNumber">+998</span>
                            <input id="phone" type="phone" required autofocus title='{{ lang('phoneNumber') }}'/>
                          </span>
                        </div>
                      </div>

                      <div class="form-group" style="position: relative;">
                        <input type="password" class="form-control" placeholder="{{lang('password')}}" value="" name="password" />
                        <span class="eye" onclick="show_pw(this)">
                          <img src="{{config('global.eye_img')}}" alt="">
                        </span>
                      </div>
                      <!-- <div class="form-group ver_area" style="display: none;">
                        <input type="text" placeholder="Please enter verification code" class="form-control" onkeyup="test_code(this)">
                      </div>
                      <button type="submit" class="btnRegister">{{lang('register')}}</button> -->
                      <div class="form-group ver_area" style="display: none;">
                        <input type="text" placeholder="Please enter verification code" class="form-control" onkeyup="test_code(this)">
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
                            </div>
                          </div>
                          <div class="col">
                            <input type="text" minlength="9" maxlength="9" class="form-control phone" placeholder="{{lang('phoneNumber')}}" value="" name="phone" />
                          </div>
                        </div>

                      </div>
                      <div class="form-group" style="position:relative">
                        <input type="password" class="form-control" placeholder="{{lang('password')}}" value="" name=" password" />
                        <span class="eye" onclick="show_pw(this)">
                          <img src="{{config('global.eye_img')}}" alt="">
                        </span>
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
                        <input type="text" data-name="h_cert_series" placeholder="{{lang('sertificateSerie')}}" class="form-control" id="h_cert_series" onchange="set_cert_number(this)">
                      </div>
                      <div class="form-group">
                        <input type="text" data-name="h_cert_number" placeholder="{{lang('sertificateNumber')}}" class="form-control" id="h_cert_number" onchange="set_cert_number(this)">
                      </div>

                      <div class="form-group">
                        <input type="hidden" name="cert_number" id="cert_number">
                      </div>
                      <div class="form-group">
                        <input type="date" name="cert_date" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>{{lang('region')}}:</label>
                        <select name="region" class="form-control">
                          @foreach(getRegions() as $region)
                          <option value="{{
                          json_decode($region['title'])->{config('global.lang')}
                        }}" data-id="{{$region['id']}}" onclick="change_region(this)">
                            {{
                          json_decode($region['title'])->{config('global.lang')}
                        }}
                            @endforeach
                          </option>
                        </select>

                      </div>
                      <div class="form-group">
                        <label>{{lang('district')}}:</label>
                        <select name="district" class="form-control" id="district_select">
                          @foreach(getDistricts() as $district)
                          <option value="{{
                      json_decode($district['title'])->{config('global.lang')}
                    }}" data-cityid="{{$district['city_id']}}" class="district">
                            {{
                      json_decode($district['title'])->{config('global.lang')}
                    }}
                            @endforeach
                          </option>
                        </select>
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
                          <a href="{{route('conditions')}}" target="blank">
                            Условия использования политика конфиденциальности
                          </a>
                        </div>
                      </div>

                      <div class="form-group ver_area" style="display: none;">
                        <input type="text" placeholder="Please enter verification code" class="form-control" onkeyup="test_code(this)">
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
  <script src="{{asset('assets/js/plugins/jquery.inputmask.min.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('md5.js')}}"></script>
  <script>
    const langs_drop = document.getElementById("langs-drop");

    function langs(e) {
      e.stopPropagation();
      langs_drop.classList.toggle('lang-clicked');
    }

    function close_langs() {
      if (langs_drop.classList.contains('lang-clicked')) {
        langs_drop.classList.remove('lang-clicked');
      }
    }

    function change_lang(e, lang) {
      e.stopPropagation();
      const base = "{{url('/')}}";
      const current = "{{url()->current()}}";
      var managed = current.split(base)[1].split('/');
      console.log(managed);
      managed[1] = lang;
      const new_url = base + managed.join('/');
      window.location.href = new_url;
    }

    $("#phone").inputmask({
      "mask": "99-999-99-99",
      'autoUnmask': true,
      "removeMaskOnSubmit": true,
    });
    var newPhone;

    function fixValue() {
      if (newPhone)
        newPhone.parentNode.removeChild(newPhone);
      var phone = document.getElementById('phone');
      newPhone = phone.cloneNode(true);
      newPhone.type = 'hidden';
      newPhone.value = '998' + newPhone.value.split("-").join("");
      newPhone.name = "phone";
      phone.parentNode.appendChild(newPhone);
    }
  </script>
  <script>
    const verification_url = "{{route('verification')}}";
    const customer = document.getElementById('home');
    const agent = document.getElementById('profile');
    var verification_hash = "";

    var phone_input;
    var phone = "";

    function send_verification() {

      if (customer.classList.contains('show')) {
        phone_input = document.getElementById('phone');
      } else {
        phone_input = agent.getElementById('phone');
      }

      if (phone_input.value.length != 9) {
        console.log(phone_input);
        alert('Please enter proper phone number');
        return 0;
      }
      phone = "998" + phone_input.value;
      // console.log(phone);
      // phone = phone_input.value;
      let url = verification_url + "?phone=" + encodeURIComponent(phone);

      $.get(url, function(data) {
        verification_hash = data;
      });
      open_verification_area();
    }

    $(document).on('change', '.custom-file-input', function(event) {
      $(this).next('.custom-file-label').html(event.target.files[0].name);
    })

    function open_verification_area() {
      $(".ver_area").css("display", "block");
    }

    function test_code(elem) {
      let form;
      if (customer.classList.contains('show')) {
        form = customer.getElementsByTagName('form')[0];
      } else {
        form = agent.getElementsByTagName('form')[0];
      }
      var input = document.createElement('input');

      if (MD5(elem.value) == verification_hash) {
        input.hidden = "true";
        input.value = verification_hash;
        input.name = "ver_code";
        form.appendChild(input);
        form.submit();
      }
    }

    var h_cert_series = "";
    var h_cert_number = "";
    /**
     * [set real certificate number]
     * @param {[type]} elem [description]
     */
    function set_cert_number(elem) {
      if (elem.dataset.name == "h_cert_series")
        h_cert_series = elem.value;

      if (elem.dataset.name == "h_cert_number")
        h_cert_number = elem.value;

      document.getElementById('cert_number').value = h_cert_series + h_cert_number;
    }
    set_cert_number(document.getElementById("h_cert_series"));
    set_cert_number(document.getElementById("h_cert_number"));


    var district = document.getElementsByClassName('district');
    /**
     * change select options of disctricts according to region selected
     * @param  {[type]} elem [description]
     * @return {[type]}      [description]
     */
    function change_region(elem) {
      document.getElementById("district_select").value = null;
      let id = elem.dataset.id;
      for (let i = 0; i < district.length; i++) {
        console.log(id);
        console.log(district[i].dataset.cityid);
        if (district[i].dataset.cityid != id)
          district[i].style.display = "none";
        else
          district[i].style.display = "";
      }
    }


    /**
     * [show_pw description]
     * @param  {html element} elem [description]
     * @return void
     */
    function show_pw(elem) {
      if (elem.parentNode.children[0].dataset.type == "text") {
        elem.parentNode.children[0].type = "password";
        elem.parentNode.children[0].dataset.type = "password"
        return 0;
      }
      elem.parentNode.children[0].type = "text";
      elem.parentNode.children[0].dataset.type = "text"
    }
  </script>
</body>

</html>