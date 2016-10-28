<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>eLib</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/generalcss.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">eLib</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">Home</a>
            </li>
            <li class="{{ Request::is('about') ? 'active' : '' }}">
                <a href="{{ url('about') }}">About Us</a>
            </li>
            <li class="{{ Request::is('membership') ? 'active' : '' }}">
                <a href="{{ url('membership') }}">Membership</a>
            </li>
            <li class="{{ Request::is('contact') ? 'active' : '' }}">
                <a href="{{ url('contact') }}">Contact Us</a>
            </li>
            <li class="{{ Request::is('sitelinks') ? 'active' : '' }}">
                <a href="{{ url('sitelinks') }}">Site Links</a>
            </li>
          </ul>
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form> -->
          <ul class="nav navbar-nav navbar-right">
<!--             <li><a href="#" data-toggle="modal" data-target="#signIn">Sign In</a></li> -->
            @if (Auth::guest())
              @if (Route::has('login'))
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
              @endif
            @endif
            @if (Auth::check())
              <li><a href="/logout">Log Out</a></li>
            @endif
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="area"></div>
    <nav class="main-menu">
        <li><a href="#">
          <i class="fa fa-search fa-2x"></i>
          <span class="nav-text">Online Catalog</span>
        </a></li>
        <li class="has-subnav"><a href="#">
          <i class="fa fa-book fa-2x"></i>
          <span class="nav-text">Collection Management</span>
          </a></li>
        <li class="has-subnav"><a href="#">
          <i class="fa fa-users fa-2x"></i>
          <span class="nav-text">User Management</span>
        </a></li>
        <li class="has-subnav"><a href="#">
          <i class="fa fa-folder-open fa-2x"></i>
          <span class="nav-text">Web Content Management</span>
        </a></li>
        <li><a href="#">
          <i class="fa fa-bar-chart-o fa-2x"></i>
          <span class="nav-text">Business Management</span>
        </a></li>
        <li><a href="#">
          <i class="fa fa-font fa-2x"></i>
          <span class="nav-text">Site Management</span>
        </a></li>
        <li><a href="#">
          <i class="fa fa-table fa-2x"></i>
          <span class="nav-text">Lookup Tables</span>
        </a></li>
      <ul class="logout">
          <li>
             <a href="#">
                   <i class="fa fa-power-off fa-2x"></i>
                  <span class="nav-text">
                      Logout
                  </span>
              </a>
          </li>  
      </ul>
    </nav>

    <div class="modal fade" id="signIn" role="dialog" tabindex="-1" aria-labelby="signInLabel">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign In</h4>
              </div>
              <div class="modal-body">
                  <div class="row">
                      <div class="col-md-12">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                            <a href="{{ url('/register') }}">Register</a>
                        </form>
                      </div>
                      <div class="col-md-6">
                        
                      </div> 
                  </div>
              </div>
            </div>
        </div>                
    </div>

    @yield('content')

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
      $(function(){
        $('#form').submit(function(event){
          var verified = grecaptcha.getResponse();
          
          if(verified.length === 0){
            event.preventDefault();
          }
        });
      });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>

<!--         <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href= "<%=url('about')%>" >About</a>
                    <a href= "<%=url('membership')%>">Membership</a>
                </div>
            </div> -->
<!--     


