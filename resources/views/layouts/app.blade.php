<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="flex min-h-screen 2xl:max-w-7xl 2xl:mx-auto 2xl:border-x-2 2xl:border-indigo-50 ">
        <!-- Sidebar -->
        <aside class="bg-white w-1/5 py-10 pl-10  min-w-min   border-r border-indigo-900/20 hidden md:block ">
            <div class=" font-bold text-2xl">Lozeq</div>

            <!-- Menu -->
            <div class="mt-12 flex flex-col space-y-7 text-gray-500 font-medium">


                <a class="  {{request()->routeIs('Admin.Dashboard-Admin') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 pr-20' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold '}} "
                    href="#">
                    <svg class="h-5 w-5 {{request()->routeIs('Admin.Dashboard-Admin') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700'}}" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>

                    </svg>
                    <span>Dashboard</span>
                </a>
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        <span>Master Data</span>
                    </svg></a>
                <a class="flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold  "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>

                    </svg>
                    <span>Transaksi</span>
                </a>
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z">
                        </path>

                    </svg>
                    <span>Penjualan</span>
                </a>
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                    </svg>
                    <span>Pembelian</span>
                </a>
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                        </path>

                    </svg>
                    <span>Metode Pembayaran</span>
                </a>
                <a class=" flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold "
                    href="#">
                    <svg class="h-5 w-5 group-hover:stroke-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span>Pengaturan</span>
                </a>


            </div><!-- /Menu -->
        </aside><!-- /Sidebar -->

        <main class="bg-indigo-50/60 w-full py-10 px-3 sm:px-10">

            <!-- Nav -->
            <nav class="text-lg flex items-center justify-between content-center ">
                <div class=" font-semibold text-xl text-gray-800 flex space-x-4 items-center">
                    <a href="#">
                        <span class="md:hidden">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>

                        </span>
                    </a>
                    <span>Invoices</span>
                </div>

                <div class="flex space-x-5 md:space-x-10 text-gray-500 items-center content-center text-base ">
                    <a class="flex items-center space-x-3 px-4 py-2 rounded-md  hover:bg-indigo-100" href="#">
                        <span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                </path>

                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="hidden sm:block">Preferences</span>
                    </a>
                    <a class="px-4 py-2 bg-indigo-100 rounded-md flex items-center space-x-2 text-indigo-500 hover:bg-indigo-200"
                        href="#">
                        <svg class="h-5 w-5 fill-indigo-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="hidden xs:block"><span class="hidden sm:inline-block">Create</span> New</div>
                    </a>
                    <a class href="#">
                        <img class="rounded-full w-10 h-10 border-2 border-indigo-200 hover:border-indigo-300"
                            src="images/avatar.jpg" alt srcset>
                    </a>
                </div>
            </nav> <!-- /Nav -->

            <div>
                {{ $slot }}
            </div>
        </main>

    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
