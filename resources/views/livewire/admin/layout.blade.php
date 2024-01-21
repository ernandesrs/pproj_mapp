<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Admin</title>

    @livewireStyles
    @vite(['resources/css/admin/app.css', 'resources/js/admin/app.js'])
</head>

<body class="bg-admin-light-normal w-full h-screen grid grid-cols-12 p-2 overflow-x-hidden">

    @include('livewire.admin.includes.aside')

    @include('livewire.admin.includes.content')

    @livewireScriptConfig

</body>

</html>
