<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="@MadeByGus">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="../assets/img/favicon.png">
    @yield('head-link')
  </head>
  <body>
    @include('includes.search-wrapper')
    <div class="site-wrapper" id="site-wrapper"> <!-- Body -->
      @include('includes.top-menu')
      @include('includes.header')
      @include('includes.sub-header')
      <main class="site-content" role="main">
        @yield('content')
      </main>
    </div>
    <!-- Page scripts -->
    <!-- <script src="js/@@jsPath.js"></script> -->
  </body>
</html>
