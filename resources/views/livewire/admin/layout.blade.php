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
        asideBackdrop: false,
        asideShow: false,

        init() {
            this.resizeHandler();
        },

        /**
         *
         * ASIDE METHODS
         *
         **/
        asideToggleNow() {
            return this.asideShow ? this.asideHiddenNow() : this.asideShowNow();
        },
        asideShowNow() {
            this.asideShow = true;

            this.asideBackdropHandler();
        },
        asideHiddenNow() {
            this.asideShow = false;
            this.asideBackdropHandler();
        },
        asideBackdropHandler() {
            if (this.isMobile) {
                this.asideBackdrop = this.isMobile ? (this.asideShow ? !this.asideBackdrop : false) : false;

                if (this.asideBackdrop) {
                    this.asideBackdropClick();
                }
            } else {
                this.asideBackdrop = false;
            }
        },
        asideBackdropClick() {
            document.addEventListener('click', this.asideBackdropClickHandler);
        },
        asideBackdropClickRemove() {
            document.removeEventListener('click', this.asideBackdropClickHandler);
        },
        asideBackdropClickHandler(event) {
            if (event.target != $refs.asideBackdrop) {
                return;
            }
            $data.asideHiddenNow();
        },

        /**
         *
         * GENERAL METHODS
         *
         **/
        resizeHandler() {
            if (window.innerWidth <= this.lgWidth && !this.isMobile) {
                this.isMobile = true;
                this.asideHiddenNow();
            } else if (window.innerWidth > this.lgWidth && this.isMobile) {
                this.isMobile = false;
                this.asideShowNow();
            }
        }
    }"
    x-on:resize.window="resizeHandler">

    <div
        class="bg-admin-light-normal w-full h-screen flex">

        <div
            x-ref="asideBackdrop"
            x-show="asideBackdrop"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="w-full h-screen bg-black bg-opacity-35 fixed lg:hidden top-0 left-0 z-40" style="display: none">
        </div>

        <aside
            x-show="asideShow"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="-translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-full"
            class="bg-admin-dark-normal shadow-lg flex flex-col fixed lg:relative z-50 lg:z-auto top-0 left-0 w-10/12 sm:w-80 lg:w-72 h-screen py-6 text-admin-light-dark"
            style="display: none;">

            {{-- aside head --}}
            <div class="px-6">
                LOREM TITLE
            </div>

            {{-- aside main --}}
            <div class="flex-1 overflow-y-auto mt-6 px-6">
            </div>

        </aside>

        <div class="flex flex-col flex-1">

            {{-- header --}}
            <header class="bg-admin-light-light">
                <div class="container w-full flex items-center h-16">
                    <button x-on:click="asideToggleNow">MENU</button>
                </div>
            </header>

            {{-- main --}}
            <main class="flex-1 overflow-y-auto" style="max-height: calc(100vh - 4rem)">
                {{ $slot }}
            </main>

        </div>
    </div>

</body>

</html>
