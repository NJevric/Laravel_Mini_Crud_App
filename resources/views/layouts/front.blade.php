<!DOCTYPE html>
<html lang="en">

<head>
@include('fixed.head')
</head>

<body>

  <!-- Navigation -->
    @include('fixed.nav')

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    @include('fixed.header')
  </header>

  <!-- Main Content -->
  <div class="container">
   @yield('content')
  </div>

  <hr>

  <!-- Footer -->
    @include('fixed.footer')

    <!-- Scripts -->
    @include('fixed.script')

</body>

</html>
