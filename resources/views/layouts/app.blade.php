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
		<link href="{{ asset('css/bulma.css') }}" rel="stylesheet">
		<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
		<!-- include summernote css/js-->
    <link href="{{ asset('css/summernote.css') }}" rel="stylesheet">
		<style>
			.navbar-item{
			margin-right: 10px;
			}
			.table td {
			text-align: center;   
			}
			.avatar {
			border-radius: 50%; 
			width: 45px; 
			height: 45px; 
			margin: 11px 0px 0px 11px;
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
					<!-- nothing here -->
				</div>
			</div>
			<div class="navbar-end">
				<p class="control">
					@if (Auth::user())
					<img class="avatar" src="{{ Auth::user()->avatar }}" />
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
		<div class="pageloader"><span class="title">Aguarde...</span></div>
		<div id="app">
			@if(session()->has('message'))
			<div class="container">
        <div class="notification is-{{ session()->get('status') }}">              
				  {{ session()->get('message') }}
        </div>
			</div>
			@endif
			@yield('content')
		</div>
		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="{{ asset('js/summernote.js') }}"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			    $('#summernote').summernote();
			  });
			$('.btn').click(function(){
			  var $pageloader = Array.prototype.slice.call(document.querySelectorAll('.pageloader'), 0);
			          $pageloader[0].classList.toggle('is-active');
			          var pageloaderTimeout = setTimeout( function() {
			            $pageloader[0].classList.toggle('is-active');
			            clearTimeout( pageloaderTimeout );
			          }, 3000 );
			});
			
		</script>
	</body>
</html>