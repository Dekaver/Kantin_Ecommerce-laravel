<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css\bootstrap\bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css\font-poppins.min.css">
    <link rel="stylesheet" href="css\style.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="js\jquery-3.5.1.slim.min.js"></script>
    <script src="js\bootstrap\bootstrap.min.js"></script>
    <script src="\js\custom.js"></script>
    <title>@yield('title')</title>
</head>
<body>
    <div class="wrapper">
    @include('layouts.navigation_right')
    <div id="content">
        @include('layouts.navigation')
        @yield('body')
    </div>
    </div>
    <br>

	


</body>
</html>
