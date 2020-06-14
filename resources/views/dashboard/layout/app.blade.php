<!doctype html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Material Kit CSS -->
  <link href="{{url('admin/assets/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <!-- CSS Files -->
<link href="/assets/css/material-dashboard.min.css?v=2.1.2" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">

    <!-- Side Bar-->
    @include('dashboard.layout.sidebar')
    <!-- End Side Bar-->

    <div class="main-panel">

      <!-- start Nav Bar -->
      {{-- @include('dashboard.layout.navbar') --}}
      <!-- End Nav Bar -->

      <!-- Start Content --> 
      <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
      </div>
      <!-- End Content -->
    
      <!-- Start Footer -->
      @include('dashboard.layout.footer')
      <!-- End Footer -->

    </div>
  </div>
  <!--   Core JS Files   -->
  @include('dashboard.layout.js')
</body>

</html>