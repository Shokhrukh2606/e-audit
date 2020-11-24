@section('loginCss')
<style>
    .phone {
        background-color: #FFF;
        line-height: 20px;
        padding: 3px;
        border: 1px #888 solid;
        display: block;

    }
    .eye{
        position: absolute;
        right: 10px;
        bottom: 10px;
        cursor: pointer;
    }
    .eye img{
        width:20px;
    }
    .phone input {
        border: 0px;
        background-color: #FFF;
    }

    .phone input:focus {
        border: 0px;
        outline: unset;
    }
</style>
@endsection
<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{asset('assets/img/logo.png')}}" alt="" style="width:150px">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
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
      <form method="POST" action="{{ route('login') }}" onsubmit="fixValue(event)">
        @csrf
        <div class="mt-4">
            <label for="phone">{{ lang('phoneNumber') }}</label> <br>
            <span class="phone">
                <span id="defaultNumber">+998</span>
                <input id="phone" type="phone" required autofocus/>
            </span>
        </div>

        <div class="mt-4" style="position: relative;">
            <x-jet-label for="password" value="{{ __('Пароль') }}" />
            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            <span class="eye" onclick="show_pw(this)">
                <img src="{{config('global.eye_img')}}" alt="">
            </span>
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
            </label>
        </div>
        @if (Route::has('password.request'))
        <a class="block text-center underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('forgot_pswrd') }}">
            {{ __('Забыли свой пароль?') }}
        </a>
        @endif
        @if (Route::has('show_register'))
        <a class="block text-center underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('show_register') }}">
            {{ __('Зарегистрировать') }}
        </a>
        @endif
        <div class="flex items-center justify-center mt-4">
            <x-jet-button class="ml-4">
                {{ __('Авторизоваться') }}
            </x-jet-button>
        </div>
    </form>
</x-jet-authentication-card>
</x-guest-layout>




<script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.inputmask.min.js')}}"></script>
<script>
    $("#phone").inputmask({
      "mask": "99-999-99-99",
      'autoUnmask': true,
      "removeMaskOnSubmit": true,
      // "skipOptionalPartCharacter": true
  });
    var newPhone;
    function fixValue(event) {
      if(newPhone)
        newPhone.parentNode.removeChild(newPhone);

    var phone = document.getElementById('phone');
    newPhone=phone.cloneNode(true);
    newPhone.type='hidden';
    newPhone.value='998'+newPhone.value.split("-").join("");
    newPhone.name="phone";
    phone.parentNode.appendChild(newPhone);
}
function show_pw(elem){
    if(elem.parentNode.children[1].dataset.type=="text"){
        elem.parentNode.children[1].type="password";
        elem.parentNode.children[1].dataset.type="password"
        return 0;
    }
    elem.parentNode.children[1].type="text";
    elem.parentNode.children[1].dataset.type="text"
}
</script>


