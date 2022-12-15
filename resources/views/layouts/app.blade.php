<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no, maximum-scale=1" /> 
        <title>@yield('title', config('app.name', 'Laravel') )</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/css/main.scss'])
        <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    </head>
    <body class="bg-white min-h-screen">
            @include('layouts.navigation')
            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
            <footer class="bg-black py-8">
                    <div class="flex flex-col md:flex-row container">
                        <div class="column1 flex flex-col items-center md:items-start w-full md:w-1/3 px-4">
                            <div class="footer__logo pb-12">
                                <x-application-logo />
                            </div>
                            <div class="footer__contacts text-gray-400">
                                <div class="pb-3">
                                    <span><a class="footer__contacts-email text-xs" href="mailto:info.rakurs@bk.ru">
                                        <img class="inline pr-3" src="{{ asset('images/services/mail.svg') }}">
                                        info.rakurs@bk.ru</a></span>
                                </div>
                                <div class="pb-3">
                                    <span class="footer__contacts-address text-xs">
                                        <img class="inline pr-3" src="{{ asset('images/services/address.svg') }}">
                                        г. Симферополь, ул. Центральная д. 5 корпус 2</span>
                                </div>
                                <div class="pb-3">
                                    <span><a class="footer__contacts-phone text-xs" href="tel:79781107283">
                                        <img class="inline pr-3" src="{{ asset('images/services/phone.svg') }}">
                                        79781107283</a></span>
                                </div>
                            </div>
                            <div class="footer__social">

                            </div>
                        </div>
                        <div class="column2 flex flex-col items-center md:items-start w-full md:w-1/3 px-4 py-2 md:py-0">
                            <x-bottom-menu class="flex-col gap-6 text-gray-400" />
                        </div>
                        <div class="column3 flex flex-col items-center md:items-start w-full md:w-1/3 px-4 py-2 md:py-0">
                            <x-partners />
                        </div>
                    </div>
            </footer>
        @vite(['resources/js/app.js'])
    </body>
</html>
