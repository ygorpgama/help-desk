<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('headerTitle')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-800">
    <header>
        <x-navbar></x-navbar>
    </header>
    <div class="m-auto">
        @yield('content')
    </div>
    @vite('resources/js/alpine.js', 'resources/js/app.js')
</body>
</html>
