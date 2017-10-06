<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

<style>
.navbar-right {
    margin-right: 0px !important;
}
</style>

</head>
<body>

<nav class="navbar is-primary">
  <div class="navbar-brand">
    <a class="navbar-item" href="http://bulma.io">
      
        <img src="http://bulma.io/images/bulma-logo-white.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      
    </a>
    <div class="navbar-burger burger" data-target="navMenuColorprimary-example">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>

  <div id="navMenuColorprimary-example" class="navbar-menu">
    <div class="navbar-start">
      <!-- 
    <a class="navbar-item" href="http://bulma.io/">
        Home
      </a>
      <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="/documentation/overview/start/">
          Docs
        </a>
        <div class="navbar-dropdown">
          <a class="navbar-item" href="/documentation/overview/start/">
            Overview
          </a>
          <a class="navbar-item" href="http://bulma.io/documentation/modifiers/syntax/">
            Modifiers
          </a>
          <a class="navbar-item" href="http://bulma.io/documentation/columns/basics/">
            Columns
          </a>
          <a class="navbar-item" href="http://bulma.io/documentation/layout/container/">
            Layout
          </a>
          <a class="navbar-item" href="http://bulma.io/documentation/form/general/">
            Form
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item" href="http://bulma.io/documentation/elements/box/">
            Elements
          </a>
          <a class="navbar-item is-active" href="http://bulma.io/documentation/components/breadcrumb/">
            Components
          </a>

        </div>-->
      </div>
    </div>

    <div class="navbar-end">
    <p class="control">
          @if (Auth::user())
          <img style="border-radius: 50%; width: 45px; height: 45px; margin: 2px;"
                                     src="{{ Auth::user()->avatar }}" />
          @endif
          </p>
      <div class="navbar-item">

        <div class="field is-grouped">

          <p class="control">
          <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    @if (Auth::user()->can_post())
                                        <li>
                                            <a href="{{ url('/new-post') }}">Nova Postagem</a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/my-all-posts') }}">Minhas Postagens</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a href="{{ url('/user/'.Auth::id()) }}">Meu Perfil</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/auth/logout') }}">Sair</a>
                                    </li>
                                </ul>
                            </li>
                            <li></li>
                        @endguest
                    </ul>
          </p>
        </div>
      </div>
    </div>
  </div>
</nav>


    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote();
          });
    </script>
</body>
</html>
