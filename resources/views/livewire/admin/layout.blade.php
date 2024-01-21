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
            } else if (window.innerWidth > this.lgWidth && this.isMobile) {
                this.isMobile = false;
            }
        }
    }"
    x-on:resize.window="resizeHandler">

    <div
        class="bg-admin-light-normal w-full h-screen">

        <div
            x-ref="asideBackdrop"
            x-show="asideBackdrop"
            class="w-full h-screen bg-black bg-opacity-35 fixed top-0 left-0 z-40" style="display: none"></div>

        <aside
            x-show="asideShow"
            class="bg-admin-dark-normal shadow-lg flex flex-col fixed z-50 top-0 left-0 w-10/12 sm:w-80 h-screen py-6 text-admin-light-dark"
            style="display: none;">

            {{-- aside head --}}
            <div class="px-6">
                LOREM TITLE
            </div>

            {{-- aside main --}}
            <div class="flex-1 overflow-y-auto mt-6 px-6">
            </div>

        </aside>

        <div class="">
            <div class="w-full flex justify-end">
                <button x-on:click="asideToggleNow">Mostra o buit</button>
            </div>
            {{ $slot }}
        </div>
    </div>

</body>

</html>
