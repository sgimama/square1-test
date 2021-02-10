<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Square1 | Blog</title>
  <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
</head>

<body class="m-0">
  <div class="w-full h-full bg-white">
    <div class="grid grid-cols-10">
      <div class="col-span-10 lg:col-span-2 text-white md:col-span-3 bg-gray-900">
        <div id="sidebar" class="content">
          <sidebar></sidebar>
        </div>
        <script src="{{mix('assets/js/sidebar.js')}}"></script>
      </div>

      <div class="col-span-10 lg:col-span-8 md:col-span-7 bg-gray-100">
        @yield('content')

      </div>

    </div>

</body>

</html>