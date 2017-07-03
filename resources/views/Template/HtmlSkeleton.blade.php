<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    @section('Favicon')
    
    @show 
    @section('Title')
    <title>@yield('Title')</title>
    @show
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @section('CSSBootstrap')
    
    <!--<link rel="stylesheet" href="{{url()}}/assets/vendor/css/ie10-viewport-bug-workaround.css">-->
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]
    <link rel="stylesheet" href="{{url()}}/assets/vendor/admin_mod/css/loader.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @show
    
    @yield('BaseCSSLib') 
  </head>
  <body>
        <nav class="navbar" style="height: 20px;">
          <div class="container">
            <div class="navbar-header">
              <a class="navbar-brand" href="#"></a>
            </div>
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Store
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Store Home</a></li>
                  <li><a href="#">Devices</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Windows</a></li>
                  <li><a href="#">Additional Software</a></li>
                  <li><a href="#">Apps</a></li>
                  <li><a href="#">Games</a></li>
                </ul>
              </li>
              <li class="dropdown" style="color: black;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Products
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Software & Services</a></li>
                  <li><a href="#">Devices & Xbox</a></li>
                  <li><a href="#">For Business</a></li>
                  <li><a href="#">For Developer & IT Pros</a></li>
                  <li><a href="#">For Students & Educators</a></li>
                </ul>
              </li>
              <li><a href="#">Support</a></li>
              
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><div class="form-group has-feedback">
                        <input type="text" style="margin-top: 10px; padding-left: 20px;" placeholder="  Search Microsoft.com">
                        <button class="btn btn-link" style=""><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>
                
              </ul>
          </div>
        </nav>

    @yield('BaseContent')
    <script type="text/javascript">
      
    </script> 
    @section('JSJquery')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @show 
    @section('PageLoader')
    <div class="loader">
      <svg viewBox="0 0 32 32" width="32" height="32">
        <circle id="spinner" cx="16" cy="16" r="14" fill="none"></circle>
      </svg>
    </div>
    @stop 
    @section('JSBootstrap')
    
    <!--<script src="{{url()}}/assets/vendor/js/ieworkaround.js"></script> -->
    @show 
    @yield('BaseJSLib') 
    @section('GA') 
    @show 
  </body>
</html>
