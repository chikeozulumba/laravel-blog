<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{--  Csrf Token  --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Blog @yield('title')</title><!--Change this title for each page-->
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://127.0.0.1:8080/CDN/bootstrap.min.css">

    {{-- Material Icons --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      
    {{-- Optional Stylsheets --}}
    @yield('stylesheets');

    <link rel="stylesheet" href="http://127.0.0.1:8080/HOST/blog-v1-23-08/css/style.css">
</head>