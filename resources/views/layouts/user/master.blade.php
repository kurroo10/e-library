<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-Library</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!--
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE
	DESIGNED & DEVELOPED by FreeHTML5.co

	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('assets/user/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('assets/user/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.css') }}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('assets/user/css/style.css') }}">

	<!-- Modernizr JS -->
	<script src="{{asset('assets/user/js/modernizr-2.6.2.min.js')}} "></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<![endif]-->

	</head>
	<body>

	<div class="fh5co-loader"></div>

	<div id="page">
	<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="fh5co-top-logo">
				<div id="fh5co-logo">
          <a href="{!! route('user.index') !!}">E-Library</a>
        </div>
			</div>
			<div class="fh5co-top-menu menu-1 text-center pull-right ">
				<ul>
					<li><a href="{!! route('user.index') !!}">Home</a></li>
          <li class="has-dropdown">
						@guest
							<a href="{!! route('login') !!}">Login</a>
						@else
							<a href="#">Setting</a>
							<ul class="dropdown">
								<li><a href="#">Change Password</a></li>
								<li>
									@if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
										<a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
												<i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
										</a>
								@else
										<a href="#"
											 onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
										>
												<i class="fa fa-fw fa-power-off"></i> {{ trans('adminlte::adminlte.log_out') }}
										</a>
										<form id="logout-form" action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" method="POST" style="display: none;">
												@if(config('adminlte.logout_method'))
														{{ method_field(config('adminlte.logout_method')) }}
												@endif
												{{ csrf_field() }}
										</form>
								@endif</li>
							</ul>
						@endguest

					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="fh5co-work">
		<div class="container">
        @yield('content')
		</div>
	</div>

	<footer id="fh5co-footer" role="contentinfo">
		<div class="container">
			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
						<small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a> Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> &amp; <a href="http://blog.gessato.com/" target="_blank">Gessato</a></small>
					</p>

					<ul class="fh5co-social-icons">
						<li><a href="#"><i class="icon-twitter"></i></a></li>
						<li><a href="#"><i class="icon-facebook"></i></a></li>
						<li><a href="#"><i class="icon-linkedin"></i></a></li>
						<li><a href="#"><i class="icon-dribbble"></i></a></li>
					</ul>

				</div>
			</div>

		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('assets/user/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('assets/user/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('assets/user/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('assets/user/js/jquery.waypoints.min.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('assets/user/js/main.js')}}"></script>

	@yield('js')

	</body>
</html>
