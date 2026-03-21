<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RentFlix - Alquila las mejores películas</title>
    
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    
    <link rel="stylesheet" href="{{ asset('css/user.index.css') }}">
    @stack('styles')
</head>
<body>
    @yield('content')
</body>
</html>
