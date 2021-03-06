<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link href="{{ asset('market_1/img/favicon.png') }}" rel="icon">
  <title>{{ $title }}</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/common.css') }}" rel="stylesheet" />
  @yield('createConcCss')
  @yield('createConclusionCss')
  <style>
    .sidebar .nav p,
    .off-canvas-sidebar .nav p {
      font-size: 10px;
      font-weight: 600;
    }
    .sidebar .nav li>a {
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .sidebar .nav li.active>a:not([data-toggle="collapse"])::before {
        top: 45%;
    }

    .sidebar .nav p {
        white-space: initial;
    }
  </style>
</head>


<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <!-- <a href="javascript:void(0)" class="simple-text logo-mini">
            HA
          </a> -->
          <a href="javascript:void(0)" class="simple-text logo-normal">
            <img src="{{ asset('assets/img/logo-white.png') }}" class="logo" alt="logo">
          </a>

        </div>
        <ul class="nav mynav">
          {{-- <li>
            <a href="{{ route('agent.list_conclusions') }}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{ lang('conclusions') }}</p>
            </a>
          </li> --}}
          <li>
            <a href="{{route("agent.list_conclusions", ['status'=>1])}}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('initialized_conclusions')}}</p>
            </a>
          </li>
          {{-- <li>
            <a href="{{route("agent.list_conclusions", ['status'=>5])}}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('received_admin_conclusions')}}</p>
            </a>
          </li> --}}
          <li>
            <a href="{{route("agent.list_conclusions", ['status'=>2])}}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('sent_conclusions')}}</p>
            </a>
          </li>
          <li>
            <a href="{{route("agent.list_conclusions", ['status'=>4])}}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('rejected_conclusions')}}</p>
            </a>
          </li>
          <li>
            <a href="{{route("agent.list_conclusions", ['status'=>3])}}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('finished_conclusions')}}</p>
            </a>
          </li>
          <li>
            <a href="{{ route('agent.create_conclusion') }}">
              <i class="tim-icons icon-simple-add"></i>
              <p>{{lang('newConclusion')}}</p>
            </a>
          </li>
          <li>
            <a href="{{ route('agent.bills') }}">
              <i class="tim-icons icon-attach-87"></i>
              <p>{{lang('bills')}}</p>
            </a>
          </li>
          <li>
            <a href="{{ route('agent.transactions_log') }}">
              <i class="tim-icons icon-bank"></i>
              <p>{{ lang('bill') }}</p>
            </a>
          </li>
          <li>
            <a href="{{ route('agent.contracts') }}">
              <i class="tim-icons icon-bank"></i>
              <p>{{ lang('contracts') }}</p>
            </a>
          </li>
          <li>
            <a href="{{ route('aac.certificates_list') }}">
              <i class="tim-icons icon-bank"></i>
              <p>{{ lang('certificates_list') }}</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">{{ lang('agentPanel') }}</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">

                  <i class="tim-icons icon-world"></i>&nbsp;<span id="nowInLanguage"> O'zbek</span>
                  <p class="d-lg-none">
                    <i class="tim-icons icon-world"></i>
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                  <li class="nav-link">
                    <a href="#" data-lang="uz" class="nav-item dropdown-item langChanger">
                      Ўзбек
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="#" data-lang="oz" class="nav-item dropdown-item langChanger">
                      O'zbek
                    </a>
                  </li>
                  <li class="nav-link">
                    <a href="#" data-lang="ru" class="nav-item dropdown-item langChanger">
                      Russian
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item br-1">
                <a href="{{ route('aac.profile') }}" class="nav-link">
                  {{ auth()->user()->name }}
                </a>
              </li>
              <li class="nav-item br-1">
                {{lang('user_funds')}}<br>
                <a href="#" class="nav-link">
                  {{ auth()->user()->funds }} UZS
                </a>
              </li>

              <li class="nav-item br-1">
                <a href="{{route('aac.fill_balance')}}" class="nav-link">
                  {{lang('fill_balance')}} <i class="tim-icons icon-simple-add fund"></i>
                </a>
              </li>
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="{{ asset('assets/img/anime3.png') }}" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none" onclick="logout()">
                    {{ lang('logout') }}
                  </p>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                    <button>{{ lang('logout') }}</button>
                  </form>

                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="javascript:void(0)" onclick="logout()" class="nav-item dropdown-item">{{ lang('logout') }}</a></li>
                  
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <script>
        function logout() {
          document.getElementById("logout-form").submit();
        }
      </script>
      <!-- End Navbar -->
      <div class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul style="padding-left: 0;margin-bottom: 0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session()->get('message') }}
        </div>
        @endif
        @yield('content')
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
               e-audit
              </a>
            </li>

          </ul>
          {{-- <div class="copyright">
                        ©
                        <script>
                            document.write(new Date().getFullYear())

                        </script>2018 made with <i class="tim-icons icon-heart-2"></i> by
                        <a href="javascript:void(0)" target="_blank">Creative Tim</a> for a better web.
                    </div> --}}
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> {{ lang('sidebarBg') }}</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">{{ lang('light') }} </span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label"> {{ lang('dark') }}</span>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('selectable/js/select2.min.js') }}"></script>

  
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/black-dashboard.min.js?v=1.0.0') }}"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
        oldBodyColor=localStorage.getItem("prefered")
        oldNavColor=localStorage.getItem("navbar")
        if(oldBodyColor){
          switch (oldBodyColor) {
            case 'white':
              $("body").addClass("white-content")   
              break;
          
            default:
              break;
          }
        }
        if(oldNavColor){
          if ($sidebar.length != 0) {
            $sidebar.attr('data', oldNavColor);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', oldNavColor);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', oldNavColor);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', oldNavColor);
          }
        }

        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');
          localStorage.setItem("navbar", new_color)
          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {
            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);
            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
          localStorage.setItem("prefered", "white")
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
          localStorage.setItem("prefered", "black")
        });
        $("#nowInLanguage").text(function(){
            let currentUrl=window.location.href
            let modified=currentUrl.split('/')
            langWords={
                'uz':'Uzbek',
                'ru':'Русский',
                'oz':'O\'zbek'
            }
            return langWords[modified[3]]
        })
        $(".langChanger").click(function(e){
          e.preventDefault()
          var needed=$(this).data("lang")
          let currentUrl=window.location.href
          let modified=currentUrl.split('/')
          modified[3]=needed
          window.location=modified.join('/')
        })
      });
    });
  </script>

  @yield('additional_js')
  @yield('createConclusionJs')

  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>
<script>
  var menu = document.getElementsByClassName('mynav')[0].children;
  for (let i = 0; i < menu.length; i++) {
    if (window.location.href.split("#")[0] == menu[i].children[0].href) {
      menu[i].classList.add('active');
    } else {
      menu[i].classList.remove('active');
    }
  }
</script>
<script>
  var menu = document.getElementsByClassName('mynav')[0].children;
  for (let i = 0; i < menu.length; i++) {
    if (window.location.href.split("#")[0] == menu[i].children[0].href) {
      menu[i].classList.add('active');
    } else {
      menu[i].classList.remove('active');
    }
  }
  $(document).ready(function() {

    // Initialize select2
    
    // Read selected option
  });
</script>

</html>