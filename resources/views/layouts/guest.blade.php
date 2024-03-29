<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('UD. Mega Buana') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @livewireStyles
    <link rel="stylesheet" href="{{asset('build/assets/app.3f308fd3.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @vite(['resources/js/app.js'])

    <!-- Styles -->
</head>

<body class="bg-white text-base overflow-x-hidden">
    <!-- Pazly Blocks Come Here -->
    <section id="pazly-template-set " class="m-0 p-0 stretchToScreen bg-white">
        <header xmlns="http://www.w3.org/1999/xhtml"
            class="text-p-gray-700 body-font shadow bg-gradient-to-t from-ungumuda to-orange-600 fixed top-0 w-full z-50 navbar-scroll wow slideInTop">
            <div class="container mx-auto flex flex-wrap py-2 flex-col md:flex-row items-center justify-between">
                <a pazly-editable="href"
                    class="flex title-font font-medium items-center px-2 text-p-gray-900 mb-4 md:mb-0">
                    <span pazly-editable="innerHTML child" class="ml-3 text-xl text-white font-bold">UD. MegaBuana</span>
                </a>
                <nav class="flex flex-wrap items-center text-center justify-center pb-4 md:pb-0">
                    <a href="{{ url('/') }}"
                        class="mr-5 text-base text-white md:text-md font-bold hover:text-white transition-all ease-in cursor-pointer">Home</a>
                    <a href="{{ url('Sejarah') }}"
                        class="mr-5 text-base text-white md:text-md font-bold hover:text-white transition-all ease-in cursor-pointer">Sejarah</a>
                    <a href="#"
                        class="mr-5 text-base text-white md:text-md font-bold hover:text-white transition-all ease-in cursor-pointer">Contact</a>
                </nav>
                <div class="flex flex-row">
                    <a href="{{ route('login') }}"
                        class="font-bold hover:bg-p-gray-400 text-p-gray-800 ml-4 py-2 px-3 rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}"
                        class="bg-black hover:bg-p-gray-800 text-white ml-4 py-2 px-3 rounded-lg">Daftar</a>
                </div>
            </div>
        </header>
        <main class="relative mt-[56px]">
            {{ $slot }}
        </main>

    </section>
    <footer class="bg-ungumuda w-full">
        <div class="w-full">
            <div class="flex flex-col w-full mt-NaN mr-NaN mb-NaN ml-NaN justify-between max-w-screen-2xl">

                <div class="flex flex-row justify-center items-center mt-8 mr-0 mb-2 ml-0"><a
                        class="flex items-center font-normal text-white text-base tracking-wide no-underline hover:no-underline">©
                        Copyright 2021, All Rights Reserved</a></div>
            </div>
        </div>
    </footer>
    @stack('modals')

    @livewireScripts

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- <script defer src="{{asset('build/assets/app.ab93cf8a.js')}}"></script> --}}

    <script>
        var app = document.getElementById('textTyp');

        var typewriter = new Typewriter(app, {
            loop: true
        });

        typewriter.typeString('Mega Buana!')
            .pauseFor(2500)
            .deleteAll()
            .typeString('Produk Lokal Markisa Makassar')
            .pauseFor(2500)
            .deleteChars(8)
            .typeString('<strong>Mega Buana!</strong>')
            .pauseFor(2500)
            .start();
    </script>
</body>

</html>
