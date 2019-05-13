<html>
<head>
    <meta charset="utf-8">
    <title>TOTP - @yield('title')</title>

    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>
<body>

<div>
    <div class="topnav">
        <a class="@yield('selectedGrantAccess')" href="{{ url('/grant-access') }}">Grant Acess</a>
        <a class="@yield('selectedAuth')"  href="{{ url('/authenticate') }}">Authenticate</a>
    </div>
</div>
<div class="container">
    @yield('content')
</div>

</body>
</html>