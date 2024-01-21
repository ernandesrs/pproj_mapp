<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - Admin</title>

    @vite(['resources/js/admin/app.js', 'resources/css/admin/app.css'])
</head>

<body
    x-data="{
        lgWidth: 1024,
        isMobile: true,
        showAside: true,

        init() {
            this.windowResizeHandler();
        },

        windowResizeHandler() {
            if (window.innerWidth <= this.lgWidth && !this.isMobile) {
                this.isMobile = true;
                this.showAside = false;
            } else if (window.innerWidth > this.lgWidth && this.isMobile) {
                this.isMobile = false;
                this.showAside = true;
            }
        }
    }"
    @resize.window="windowResizeHandler"
    class="bg-admin-light-normal w-full h-screen grid grid-cols-12 p-2 overflow-x-hidden">

    <aside
        x-show="showAside"
        class="bg-admin-dark-normal fixed lg:relative w-10/12 sm:w-80 lg:w-auto lg:col-span-3 xl:col-span-2 rounded p-6 overflow-y-auto"
        style="height: calc(100vh - 1rem); display: none;">
    </aside>

    <div class="flex flex-col col-span-12 lg:col-span-9 xl:col-span-10 rounded"
        style="height: calc(100vh - 1rem)">

        <header class="h-16 flex items-center border-b border-admin-light-dark border-opacity-10">
            <div class="container px-6">
                <button
                    x-on:click="showAside=!showAside">MENU</button>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto flex flex-col"
            style="height: calc(100vh - (1rem))">
            {{ $slot }}
        </main>


    </div>

</body>

</html>
