<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog Home</title>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/blog-home.css') }}" rel="stylesheet">
  <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">

</head>

<body>

  @include('layouts.nav')

  @include('layouts.alert')

  <div class="container">

    <div class="row">

      <div class="col-md-8">

        @yield('content')

      </div>
      
      @include('layouts.sidebar')

    </div>

  </div>

  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
  </footer>

  <script src="{{ asset('js/jquery-3.2.1.min.js') }}" ></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
  <script src="{{ asset('js/select2.min.js') }}"></script>

  @yield('script')

</body>

</html>
