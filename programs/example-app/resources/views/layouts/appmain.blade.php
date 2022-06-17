<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Study Course - Education Category Bootstrap Responsive Template | Contact : W3layouts</title>
    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js" integrity="sha256-6XMVI0zB8cRzfZjqKcD01PBsAy3FlDASrlC8SxCpInY=" crossorigin="anonymous"></script>
    <!-- Template CSS -->
    <link href="{{ asset('css/style-starter.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
  </head>
  <body>
   <!--header-->

          <header id="site-header" class="fixed-top">
            <div class="container">
              <nav class="navbar navbar-expand-lg navbar-dark stroke">
                <h1>
                  <a class="navbar-brand" href="index.html">
                    <span class="fa fa-diamond"></span>Study Course <span class="logo">Journey to success</span></a>
                </h1>

                <!-- if logo is image enable this   
                  <a class="navbar-brand" href="#index.html">
                      <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                  </a> -->
                <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                  data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                  <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                  </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{'index'}}">Home <span class="sr-only">(current)</span></a>
                    
                    </li>
                    <li class="nav-item @@about__active">
                      <a class="nav-link" href="{{'about'}}">About</a>
                    </li>
                    <li class="nav-item @@courses__active">
                      <a class="nav-link" href="{{'courses'}}">Courses</a>
                    </li>
                    <li class="nav-item @@contact__active">
                      <a class="nav-link" href="{{'contact'}}">Contact</a>
                    </li>
                  </ul>

                  <!--/search-right-->
                  <div class="search-right">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <!-- search popup -->
                    <div id="search" class="pop-overlay">
                      <div class="popup">

                        <form action="error.html" method="GET" class="search-box">
                          <input type="search" placeholder="Search" name="search" required="required" autofocus="">
                          <button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
                        </form>

                      </div>
                      <a class="close" href="#close"> x </a>
                    </div>
                    <!-- /search popup -->
                  </div>
                  <div class="top-quote mr-lg-2 text-center">
                    <a href="#login" class="btn login mr-2"><span class="fa fa-user"></span> login</a>
                  </div>
                </div>
                <!-- toggle switch for light and dark theme -->
                <div class="mobile-position">
                  <nav class="navigation">
                    <div class="theme-switch-wrapper">
                      <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox">
                        <div class="mode-container py-1">
                          <i class="gg-sun"></i>
                          <i class="gg-moon"></i>
                        </div>
                      </label>
                    </div>
                  </nav>
                </div>
                <!-- //toggle switch for light and dark theme -->
              </nav>
            </div>
          </header>
<!--/header-->
            <!-- footer -->
            @include('footer')
            <!-- //footer -->
            <!-- Template JavaScript -->
           @include('javascript')
            <!--//MENU-JS-->
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

