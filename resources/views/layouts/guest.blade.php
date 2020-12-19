<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>e-audit</title>

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

    function show_pw(elem) {
      if (elem.parentNode.children[1].dataset.type == "text") {
        elem.parentNode.children[1].type = "password";
        elem.parentNode.children[1].dataset.type = "password"
        return 0;
      }
      elem.parentNode.children[1].type = "text";
      elem.parentNode.children[1].dataset.type = "text"
    }
  </script>
</body>

</html>
