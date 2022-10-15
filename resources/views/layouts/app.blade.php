<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <!-- Scripts -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    <!-- Styles -->
    @livewireStyles
    <style>
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            width: 100%;
            height: 100vh;
            z-index: 50;
            background-color: #000;
            opacity: 0.2;
        }

        .loading-icon {
            background-color: #000;
            border: 2px solid #ffff;
            width: 200px;
            height: 200px;
            border-radius: 100px;
            border-top: none;

        }
    </style>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" /> --}}
</head>

<body class="font-sans antialiased">
    {{-- <div class="loading">
        <div class="loading-icon animate-spin">
        </div>
    </div> --}}
    <div class="flex min-h-screen 2xl:max-w-7xl 2xl:mx-auto 2xl:border-x-2 2xl:border-primary">
        <!-- Sidebar -->

        <aside class="bg-gradient-to-b from-neutral to-yellow-800 w-1/5 py-10 pl-10  min-w-min   border-r border-primary/20 hidden md:block ">
            <div class=" font-bold text-2xl text-white">{{ Auth::user()->name }}</div>

            <!-- Menu -->
            <div class="mt-12 flex flex-col space-y-7 text-white font-medium" x-data="{ Master: false, Transaksi: false, Produk: false }">


                @include('navigation-menu')
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-primary hover:font-semibold "
                    href="{{ route('Page-Bank') }}">
                    <svg class="h-5 w-5 group-hover:stroke-primary" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>

                    </svg>
                    <span>Metode Pembayaran</span>
                </a>
                <form action="{{ route('logout') }}" method="POST"
                    class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-primary hover:font-semibold ">
                    @csrf
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    <button type="submit">Logout</button>
                </form>


            </div><!-- /Menu -->
        </aside><!-- /Sidebar -->

        <main class="bg-primary0 w-full ">

            <!-- Nav -->
            <nav class="text-lg flex items-center justify-between content-center py-5 px-5 bg-gradient-to-r from-neutral to-yellow-700">
                <div class=" font-semibold text-xl text-white flex space-x-4 items-center">
                    <a href="#">
                        <span class="md:hidden">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>

                        </span>
                    </a>
                    <span>{{ $page }}</span>
                </div>

                <div class="flex space-x-5 md:space-x-10 text-white items-center content-center text-base ">
                    <a class="flex items-center space-x-3 px-4 py-2 rounded-md  hover:bg-primary"
                        href="{{ route('profile.show') }}">
                        <span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="hidden sm:block">Setting</span>
                    </a>
                    <a class href="#">
                        <img class="rounded-full w-10 h-10 border-2 border-primary hover:border-primary"
                            src="{{ Auth::user()->profile_photo_url }}" alt srcset>
                    </a>
                </div>
            </nav> <!-- /Nav -->

            <section class="px-3">
                {{ $slot }}
            </section>
        </main>

    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
