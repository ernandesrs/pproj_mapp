<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Dash</title>

    @livewireStyles
    @vite(['resources/css/dash/app.css', 'resources/js/dash/app.js'])
</head>

<body>

    {{ $slot }}

    @livewireScriptConfig

</body>

</html>
