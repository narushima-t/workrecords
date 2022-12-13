<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/sample.css">
    <link rel="stylesheet" href="/css/add.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<body>
    @yield('header')

    <div class="contents">
        @yield('content')
    </div>

    <!-- @yield('footer') -->

</body>
</html>
    
<!-- <div class="footer">
  <ul class="menu">
    <li><a href="#">AAAAA</a></li>
    <li><a href="#">BBBBB</a></li>
    <li><a href="#">CCCCC</a></li>
    <li><a href="#">DDDDD</a></li>
    <li><a href="#">EEEEE</a></li>
  </ul>
  <p class="copyright">
    &copy; My Site
  </p>
</div>
</body>
</html> -->