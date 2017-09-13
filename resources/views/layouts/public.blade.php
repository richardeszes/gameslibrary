<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/public/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/public/style.css" rel="stylesheet">
    <link href="/css/public/font-awesome.min.css" rel="stylesheet">


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/') }}">Games</a>
              </li>
              @if (Route::has('login'))
                  @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/admin') }}">Admin area</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
              </li>
                  @else
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
                  @endauth
              @endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div id="service">
        <div class="container">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </div>

	<!-- *****************************************************************************************************************
	 FOOTER
	 ***************************************************************************************************************** -->
	 <div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-md-12">
                    <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name', 'Laravel') }} 2017</p>
		 		</div>
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/js/public/bootstrap.min.js"></script>
	<script src="/js/public/retina-1.1.0.js"></script>
	<script src="/js/public/jquery.hoverdir.js"></script>
	<script src="/js/public/jquery.hoverex.min.js"></script>
	<script src="/js/public/jquery.prettyPhoto.js"></script>
  	<script src="/js/public/jquery.isotope.min.js"></script>
  	<script src="/js/public/custom.js"></script>
    @yield('beforefooter')
  </body>
</html>
