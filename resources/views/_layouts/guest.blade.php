<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/image/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    @vite('resources/css/app.css')
    @stack('head')
</head>

<body class="bg-white">
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.11.0/cdn.min.js"
        integrity="sha512-/mpY0EOuRPY/e7Lly6R/09B3/IRLs7Pw99BR51r9ikhdd0zhX3SNxompa3MSKjcMN35uD9Xu3P4s0notDsviVg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        feather.replace();
    </script>
    @stack('js')
</body>

</html>
