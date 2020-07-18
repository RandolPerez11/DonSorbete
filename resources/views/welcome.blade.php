<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href={{ asset('css/stilos.css')}}>

        <title>Don sorbete</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body class="hidden">
      <header>
        <nav id="nav" class="nav1">
            <div class="contenedor-nav">
              <div class="logo">
                <img src={{ asset ('img/logo2.png') }} alt="">
              </div>
              <div class="enlaces" id="enlaces">
                @if (Route::has('login'))
                      @auth
                          <a href="{{ url('/home') }}">Home</a>
                      @else
                          <a href="{{ route('login') }}">Login</a>
                      @endauth
              @endif

              </div>
              <div class="icono" id="open">
                <span>&#9776;</span>
              </div>
            </div>
        </nav>
        <div class="textos">
          <img src={{ asset ('img/logo2.png') }} alt="">
        </div>
      </header>


      <script src="js/jquery.js"></script>
      <script src="js/main.js"></script>
      <script src="js/filtro.js"></script>
      <!--<script src="font-awesome/js/fontawesome.js"></script>-->
    </body>
</html>
