<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design for Bootstrap</title>
  <!-- MDB icon -->
  <link rel="icon" href="{{ asset('img/mdb-favicon.ico')}}" type="image/x-icon">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/mdb.min.css')}}">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">

   <!-- DataTables CSS -->

   <link href="{{ asset('css/addons/datatables.min.css')}}" rel="stylesheet">
   <link href="{{ asset('css/addons/datatables-select.min.css')}}" rel="stylesheet">
   <script src="{{ asset('js/app.js')}}"></script>
</head>
<body>
<div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Betpredict') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can('edit-user')
                                        <a class="dropdown-item" href="{{route('home')}}">
                                            {{ __('Dashboard') }}
                                        </a>
                                    @endcan
                                    <a class="dropdown-item" href="{{route('admin.profile', Auth::user()->id)}}">
                                        {{ __('Premium Predictions') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                            </li>
                        @endguest
                    </ul>
                </div>
                
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>
    </div>
  
  <!-- jQuery -->
  <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('js/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <!-- <script type="text/javascript" src="{{ asset('js/bootstrap.min.js')}}"></script> -->
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('js/mdb.min.js')}}"></script>
  <!-- Your custom scripts (optional) -->
 
  <!-- DataTables JS -->
  <script src="{{ asset('js/addons/datatables.min.js')}}" rel="stylesheet"></script>
  <script src="{{ asset('js/addons/datatables-select.min.js')}}" rel="stylesheet"></script>

  <script type="text/javascript">
   $(document).ready(function () {
      $('#dtMaterialDesignExample').DataTable();
      $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
      });
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        const $this = $(this);
        $this.attr("placeholder", "Search");
        $this.removeClass('form-control-sm');
      });
      $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
      $('#dtMaterialDesignExample_wrapper select').removeClass(
      'custom-select custom-select-sm form-control form-control-sm');
      $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
      $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
    });
  </script>
</body>
</html>