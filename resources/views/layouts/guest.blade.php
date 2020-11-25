<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('loginCss')

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>

</head>

<body>
  <div class="font-sans text-gray-900 antialiased">
    {{ $slot }}
  </div>

  <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('assets/js/plugins/jquery.inputmask.min.js')}}"></script>
  <script>
    $("#phone").inputmask({
      "mask": "99-999-99-99",
      'autoUnmask': true,
      "removeMaskOnSubmit": true,
      "skipOptionalPartCharacter": true
    });

    function fixValue(event) {
      var phone = document.getElementById('phone');
      // event.preventDefault();
      document.getElementById('defaultNumber').style.display = 'none'
      $("#phone").inputmask('remove');
      phone.value = '998' + phone.value;
      console.log(phone.value)
    }

  </script>
</body>

</html>