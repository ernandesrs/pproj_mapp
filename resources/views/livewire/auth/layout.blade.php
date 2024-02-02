<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - {{ $title ?? '' }}</title>

    @vite(['resources/css/auth/app.css', 'resources/js/auth/app.js'])
</head>

<body class="w-full h-screen flex justify-center items-center">

    {{ $slot }}

</body>

</html>
