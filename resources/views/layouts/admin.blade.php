<html>

<head>
  <title>Article - @yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('/css/layout.css') }}" rel="stylesheet" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="wrapper">
    <div id="sidebar">
      <div class="title">
        Project
      </div>
      <ul class="menu">
        <li><a href="{{env('APP_URL')}}admin/article">Article manage</a></li>
        <li><a href="{{env('APP_URL')}}admin/header">Header structure</a></li>
      </ul>
    </div>
    <div id="layout-content">
      <div class="navbar d-flex justify-content-end">
        <a href="{{env('APP_URL')}}logout" class="btn btn-link logout">Logout</a>
      </div>
      <div class="breadcrumb">@yield('breadcrumb')</div>
      <div class="page-container">
        @yield('page')
      </div>
    </div>
</body>

</html>