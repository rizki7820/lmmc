<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page')</title>
    @vite('resources/css/app.css')
</head>

<body class="relative flex items-center justify-center min-h-screen px-4 bg-gray-100"
    style="background-image: url('{{ asset('assets/image/bg.jpg') }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 backdrop-blur-sm z-[-1]"></div>
    <div class="absolute inset-0 bg-black opacity-50 z-[-1]"></div>

    @yield('content')
</body>

</html>
