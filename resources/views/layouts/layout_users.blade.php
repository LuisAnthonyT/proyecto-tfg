<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <title>
        @yield('title')
    </title>
</head>
<body>
    @include('partials.navbar_trainers')

    @yield('content')
    @yield('js')
</body>
</html>
