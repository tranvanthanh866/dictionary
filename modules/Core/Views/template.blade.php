<!doctype html>
<html lang='{{ str_replace('_', '-', app()->getLocale()) }}'>
<head>
    <meta charset='utf-8'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    @yield('head')
</head>
<body class="@yield('class-body')">
@yield('before-body')

@yield('header')

@yield('content')

@yield('footer')

@yield('script')

</body>
</html>
