<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>{{ config('app.name', 'Laravel') }} - Admin area</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/css/admin/bootstrap.min.css" />
<link rel="stylesheet" href="/css/admin/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/css/admin/matrix-style.css" />
<link rel="stylesheet" href="/css/admin/matrix-media.css" />
<link href="/css/admin/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="/css/admin/jquery.gritter.css" />
<link rel="stylesheet" href="/css/admin/select2.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">{{ config('app.name', 'Laravel') }} - Admin area</a></h1>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class=""><a title="" href="/games"><i class="icon icon-globe"></i> <span class="text">Public page</span></a></li>
    @if (Route::has('login'))
        @auth
    <li class=""><a title="" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        @endauth
    @endif
  </ul>
</div>
<!--close-top-Header-menu-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    @if (Route::has('login'))
        @auth
    <li> <a href="/admin/games"><i class="icon icon-dashboard"></i> <span>Games</span></a> </li>
    <li> <a href="/admin/consoles"><i class="icon icon-cogs"></i> <span>Consoles</span></a> </li>
    <li> <a href="/admin/publishers"><i class="icon icon-globe"></i> <span>Publishers</span></a> </li>
    <li> <a href="/admin/categories"><i class="icon icon-sitemap"></i> <span>Categories</span></a> </li>
    <li> <a href="/admin/tags"><i class="icon icon-tag"></i> <span>Tags</span></a> </li>
        @else
    <li> <a href="{{ route('login') }}"><i class="icon icon-dashboard"></i> <span>Login</span></a> </li>
        @endauth
    @endif
  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
    @yield('admincontent')
</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>

<!--end-Footer-part-->

<script src="/js/admin/jquery.min.js"></script>
<script src="/js/admin/jquery.ui.custom.js"></script>
<script src="/js/admin/bootstrap.min.js"></script>
<script src="/js/admin/select2.min.js"></script>

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();
          }
          // else, send page to designated URL
          else {
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
@yield('adminbeforefooter')
</body>
</html>
