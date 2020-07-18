<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Don Sorbete') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stiloRB.css') }}" rel="stylesheet">
    <link href="{{ asset('css/stiloPop.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/FixedHeader-3.1.4/css/fixedHeader.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
      <nav style="background:transparent;" class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container">
            <img alt="" src="{{asset('img/logo2.png')}}" style="height:50px; width:60px;">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                           @guest
                               <li class="nav-item">
                                   <a style="color:white;" class="nav-link" href="{{ url('/') }}">{{ __('Inicio') }}</a>
                               </li>

                           @else
                               @can ('users.index')
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                               </li>
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('sucur.index') }}">Sucursales</a>
                               </li>
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('vent.buscierre') }}">Cierre de Caja</a>
                               </li>
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('egre.index') }}">Egresos</a>
                               </li>
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('config.Brepor') }}">
                                   {{ __('Reportes') }}
                                 </a>
                               </li>
                               <li class="nav-item">
                                  <a style="color:white;" class="nav-link" href="{{ route('config.index') }}">
                                    {{ __('Configuración') }}
                                  </a>
                               </li>
                               @endcan
                               <li class="nav-item">
                                 <a style="color:white;" class="nav-link" href="{{ route('vent.index') }}">Ventas</a>
                               </li>
                               <li class="nav-item">
                                 <a style="color:red;" class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Salir') }}
                                 </a>
                               </li>
                               <li class="nav-item dropdown">
                                   <a style="color:white;"  class="nav-link " href="#" >
                                       {{ Auth::user()->name }} <span class="caret"></span>
                                   </a>

                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('sweetalert::alert')
    {!!Html::script('jquery/dist/jquery.min.js')!!}
    {!!Html::script('js/dropdown.js')!!}
    {!!Html::script('DataTables/datatables.min.js')!!}
    {!!Html::script('DataTables/FixedHeader-3.1.4/js/fixedHeader.bootstrap4.min.js')!!}
</body>
</html>
