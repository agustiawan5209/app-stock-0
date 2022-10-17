<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="bumblebee">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('UD. Mega Buana') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="{{asset('js/core.js')}}"></script>

    <!-- Styles -->
    @livewireStyles
</head>

<body class="bg-white font-family-karla">
    <!-- Pazly Blocks Come Here -->
    <section id="pazly-template-set" class="m-0 p-0 stretchToScreen bg-white">
        <header xmlns="http://www.w3.org/1999/xhtml" class="text-p-gray-700 body-font shadow">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center justify-between">
                <a pazly-editable="href"
                    class="flex title-font font-medium items-center px-2 text-p-gray-900 mb-4 md:mb-0">
                    <span pazly-editable="innerHTML child" class="ml-3 text-xl">UD. MegaBuana</span>
                </a>
                <nav class="flex flex-wrap items-center text-center justify-center pb-4 md:pb-0">
                    <a href="{{ url('/')}}" class="mr-5 hover:text-p-gray-900 cursor-pointer">Home</a>
                    <a href="{{ url('Sejarah')}}" class="mr-5 hover:text-p-gray-900 cursor-pointer">Sejarah</a>
                    <a href="#" class="mr-5 hover:text-p-gray-900 cursor-pointer">Contact</a>
                </nav>
                <div class="flex flex-row">
                    <a pazly-editable="innerHTML href bg" target="_blank"
                        class="bg-p-gray-200 hover:bg-p-gray-400 text-p-gray-800 ml-4 py-2 px-3 rounded-lg">Log In</a>
                    <a pazly-editable="innerHTML href bg" target="_blank"
                        class="bg-black hover:bg-p-gray-800 text-white ml-4 py-2 px-3 rounded-lg">Sign Up</a>
                </div>
            </div>
        </header>
        <main>
            {{$slot}}
        </main>
        <div>
            <div class="canvas-paper">
                <div class="bg-white w-full pt-16 pr-24 pb-16 pl-24 container mx-NaN">
                    <div class="w-full">
                        <div class="flex flex-col w-full mt-NaN mr-NaN mb-NaN ml-NaN justify-between max-w-screen-2xl">
                            <div
                                class="flex flex-row bg-white justify-center items-center mt-2 mr-0 mb-2 ml-0 md:m-0 hidden md:flex">
                                <a url="#"
                                    class="text-gray-700 text-center font-semibold text-lg hover:text-gray-600 hover:-translate-y-1 hover:text-gray-600">Features</a><a
                                    url="#"
                                    class="text-gray-700 text-center mt-0 mr-16 mb-0 ml-16 font-semibold text-lg hover:text-gray-600 hover:-translate-y-1 hover:text-gray-600">Pricing</a><a
                                    url="#"
                                    class="text-gray-700 text-center font-semibold text-lg hover:text-gray-600 hover:-translate-y-1 hover:text-gray-600">About
                                    Us</a>
                            </div>
                            <div class="flex flex-row justify-center items-center mt-8 mr-0 mb-8 ml-0"><a
                                    class="flex items-center font-semibold text-gray-800 text-xl tracking-wide no-underline hover:no-underline">WINDFRAME</a>
                            </div>
                            <div class="bg-[object Object] flex flex-row items-center justify-center md:m-0 hidden md:flex">
                                <a
                                    class="mt-0 mr-2 mb-0 ml-2 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200 hover:bg-gray-100"><svg
                                        class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M20.283 10.356h-8.327v3.451h4.792c-.446 2.193-2.313 3.453-4.792 3.453a5.27 5.27 0 0 1-5.279-5.28 5.27 5.27 0 0 1 5.279-5.279c1.259 0 2.397.447 3.29 1.178l2.6-2.599c-1.584-1.381-3.615-2.233-5.89-2.233a8.908 8.908 0 0 0-8.934 8.934 8.907 8.907 0 0 0 8.934 8.934c4.467 0 8.529-3.249 8.529-8.934 0-.528-.081-1.097-.202-1.625z">
                                        </path>
                                    </svg></a><a
                                    class="mt-0 mr-4 mb-0 ml-4 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200 hover:bg-gray-100"><svg
                                        class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <circle cx="4.983" cy="5.009" r="2.188"></circle>
                                        <path
                                            d="M9.237 8.855v12.139h3.769v-6.003c0-1.584.298-3.118 2.262-3.118 1.937 0 1.961 1.811 1.961 3.218v5.904H21v-6.657c0-3.27-.704-5.783-4.526-5.783-1.835 0-3.065 1.007-3.568 1.96h-.051v-1.66H9.237zm-6.142 0H6.87v12.139H3.095z">
                                        </path>
                                    </svg></a><a
                                    class="rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200 hover:bg-gray-100 mt-0 mr-2 mb-0 ml-2"><svg
                                        class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19.633 7.997c.013.175.013.349.013.523 0 5.325-4.053 11.461-11.46 11.461-2.282 0-4.402-.661-6.186-1.809.324.037.636.05.973.05a8.07 8.07 0 0 0 5.001-1.721 4.036 4.036 0 0 1-3.767-2.793c.249.037.499.062.761.062.361 0 .724-.05 1.061-.137a4.027 4.027 0 0 1-3.23-3.953v-.05c.537.299 1.16.486 1.82.511a4.022 4.022 0 0 1-1.796-3.354c0-.748.199-1.434.548-2.032a11.457 11.457 0 0 0 8.306 4.215c-.062-.3-.1-.611-.1-.923a4.026 4.026 0 0 1 4.028-4.028c1.16 0 2.207.486 2.943 1.272a7.957 7.957 0 0 0 2.556-.973 4.02 4.02 0 0 1-1.771 2.22 8.073 8.073 0 0 0 2.319-.624 8.645 8.645 0 0 1-2.019 2.083z">
                                        </path>
                                    </svg></a>
                            </div>
                            <div class="flex flex-row justify-center items-center mt-8 mr-0 mb-2 ml-0"><a
                                    class="flex items-center font-normal text-gray-500 text-xl tracking-wide no-underline hover:no-underline">©
                                    Copyright 2021, All Rights Reserved</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
    @stack('modals')

    @livewireScripts

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
