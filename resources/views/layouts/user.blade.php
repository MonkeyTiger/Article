<html>

<head>
  <title>Article - @yield('title')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="{{ asset('/css/layout.css') }}" rel="stylesheet" />
  <meta name="csrf_token" content="{{ csrf_token() }}" />

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <div class="header d-flex justify-content-between align-items-end px-5 py-2 border-bottom">
      <img src="{{asset('/imgs/logo.jpg')}}" alt="">
      <div class="d-flex" id="search">
        <input type="text" class="form-control rounded-0" value="{{$searchKey}}" />
        <button class="btn btn-success rounded-0">Search</button>
      </div>
    </div>
    <div class="navbar user-menu">
      <ul>
        @foreach($headers as $key => $header)
        <li><a href="{{env('APP_URL')}}{{$header->link}}">{{$header->name}}</a></li>
        @endforeach
      </ul>
    </div>
    @yield('page')

  </div>
  </div>
  <script>
    var gSiteURL = "<?php echo env('APP_URL') ?>";
  </script>
  <script src="{{asset('/js/user.js')}}"></script>
</body>

</html>