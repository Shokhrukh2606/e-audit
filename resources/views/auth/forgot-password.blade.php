<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your phone number and we will send sms of verification.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('forgot_pswrd') }}">
            @csrf

            <div class="block">
                <x-jet-label for="phone" value="{{ __('Phone') }}" />
                +998
                <input id="phone" class="block mt-1 w-full" type="phone" name="phone"  required autofocus />
            </div>
            <div class="form-group" id="pswrd">
              <input  type="text" class="form-control" placeholder="new password" value="" name="password"/>
            </div>
            <div class="flex items-center justify-end mt-4">
               <button type="button" onclick="send_verification()">
                    {{ __('Verify Phone') }}
                </button>
            </div>
        </form>
        <input type="text" id="ver_area" placeholder="please enter verification code">
    </x-jet-authentication-card>
</x-guest-layout>

<script>
    const verification_url="{{route('verification')}}";
    var verification_hash;
    var phone=document.getElementById("phone");
    function send_verification(){
      if(phone.value.length!=9){
        alert('Please enter proper phone number');
        return 0;
      }
      phone="998"+phone.value;
      let url=verification_url+"?phone="+encodeURIComponent(phone);
      
      $.get(url, function(data){
        verification_hash=data;
      })
      open_verification_area();
    }
    
    function open_verification_area(){
      document.getElementById("ver_area").style.display="block";
    }
    function test_code(elem){
      let form;
      if(customer.style.display!='none'){
        form=customer.getElementsByTagName('form')[0];
      }else{
        form=agent.getElementsByTagName('form')[0];
      }
      if(MD5(elem.value)==verification_hash){
        form.submit();
      }
    }
</script>
