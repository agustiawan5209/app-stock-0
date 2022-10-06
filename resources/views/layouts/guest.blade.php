<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ __('UD. Mega Buana') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('build/assets/app.79d55634.css')}}">
        <!-- Scripts -->
        @vite(['resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-white font-family-karla">

        <!-- Top Bar Nav -->
       @include('layouts.navbar-guest')


        <div class="container mx-auto flex flex-wrap py-6">

          {{$slot}}
        </div>

        <footer class="w-full border-t bg-white pb-12">
            <div
                class="relative w-full flex items-center invisible md:visible md:pb-12"
                x-data="getCarouselData()"
            >
                <button
                    class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                    x-on:click="decrement()">
                    &#8592;
                </button>
                <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                    <img class="w-1/6 hover:opacity-75" :src="image">
                </template>
                <button
                    class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                    x-on:click="increment()">
                    &#8594;
                </button>
            </div>
            <div class="w-full container mx-auto flex flex-col items-center">
                <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                    <a href="#" class="uppercase px-3">About Us</a>
                    <a href="#" class="uppercase px-3">Privacy Policy</a>
                    <a href="#" class="uppercase px-3">Terms & Conditions</a>
                    <a href="#" class="uppercase px-3">Contact Us</a>
                </div>
                <div class="uppercase pb-6">&copy; myblog.com</div>
            </div>
        </footer>

        <script>
            function getCarouselData() {
                return {
                    currentIndex: 0,
                    images: [
                        'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                        'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                    ],
                    increment() {
                        this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                    },
                    decrement() {
                        this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                    },
                }
            }
        </script>

        @stack('modals')

        @livewireScripts
    </body>
</html>
