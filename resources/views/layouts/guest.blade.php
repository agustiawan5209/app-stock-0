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
    <body>
        <nav class=" container mx-auto relative p-6 ">
            <div class=" flex flex-row justify-between items-center">
                <img src="img/logo.svg" alt="logo" class="items-center mt-2 " />

                <!-- links -->
                <div class=" space-x-4 md:flex hidden">
                    <a href="#" class="hover:text-blue-600">Pricing</a>
                    <a href="#" class="hover:text-blue-600">Product</a>
                    <a href="#" class="hover:text-blue-600">About Us</a>
                    <a href="#" class="hover:text-blue-600">Careers</a>
                    <a href="#" class="hover:text-blue-600">Community</a>
                </div>

                <a href="{{route('login')}}" class=" bg-orange-600 rounded-full px-4 py-2 hover:bg-brightRedLight text-white hidden md:block">Get
                    Started</a>

                <button title="menu-btn" class=" md:hidden text-3xl menu-toggle-icon" id="menu-toggle-icon">
                    <i class="ri-menu-3-line open-menu-icon" id="open-btn"></i>
                    <i class="ri-close-line close-menu-icon " id="close-btn"></i>


                    <!-- Mobile links -->
                    <div class="mt-4 ">
                        <div class="px-14 absolute font-bold text-lg flex flex-col right-7 border-2 border-black pt-4 pb-5 space-y-8 py-8 bg-white "
                            id="Menu">
                            <a href="#" class="hover:text-blue-600">Pricing</a>
                            <a href="#" class="hover:text-blue-600">Product</a>
                            <a href="#" class="hover:text-blue-600">About Us</a>
                            <a href="#" class="hover:text-blue-600">Careers</a>
                            <a href="#" class="hover:text-blue-600">Community</a>
                        </div>
                    </div>

                </button>





            </div>

        </nav>

        <main class="md:px-10">
            {{$slot}}
        </main>


    <!-- Footer -->
    <footer class="bg-gray-800">
        <!-- Flex Container -->
        <div
            class="container p-6 flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
            <!-- Logo and social links container -->
            <div
                class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start">
                <div class="mx-auto my-6 text-center text-white md:hidden">
                    Copyright &copy; 2022, All Rights Reserved
                </div>
                <!-- Logo -->
                <div>
                    <img src="{{asset('img/logo-white.svg')}}" class="h-8" alt="" />
                </div>
                <!-- Social Links Container -->
                <div class="flex justify-center space-x-4">
                    <!-- Link 1 -->
                    <a href="#">
                        <img src="img/icon-facebook.svg" alt="" class="h-8" />
                    </a>
                    <!-- Link 2 -->
                    <a href="#">
                        <img src="img/icon-youtube.svg" alt="" class="h-8" />
                    </a>
                    <!-- Link 3 -->
                    <a href="#">
                        <img src="img/icon-twitter.svg" alt="" class="h-8" />
                    </a>
                    <!-- Link 4 -->
                    <a href="#">
                        <img src="img/icon-pinterest.svg" alt="" class="h-8" />
                    </a>
                    <!-- Link 5 -->
                    <a href="#">
                        <img src="img/icon-instagram.svg" alt="" class="h-8" />
                    </a>
                </div>
            </div>

            <!-- List Container -->
            <div class="flex flex-row mx-auto space-x-12 ">
                <div class="flex flex-col space-y-4 text-white ">
                    <a href="#" class="hover:text-red-500">Home</a>
                    <a href="#" class="hover:text-red-500">Pricing</a>
                    <a href="#" class="hover:text-red-500">Products</a>
                    <a href="#" class="hover:text-red-500">About</a>
                </div>

                <div class="flex flex-col space-y-4 text-white ">
                    <a href="#" class="hover:text-red-500">Careers</a>
                    <a href="#" class="hover:text-red-500">Community</a>
                    <a href="#" class="hover:text-red-500">Privacy Policy</a>
                </div>
            </div>
            <!-- Input Container -->
            <div class="flex flex-col justify-between">
                <form>
                    <div class="flex space-x-3">
                        <input type="text" class="flex-1 px-4 rounded-full focus:outline-none"
                            placeholder="Updated in your inbox" />
                        <button
                            class="px-6 py-2 text-white rounded-full bg-red-500 hover:bg-brightRedLight focus:outline-none">
                            Go
                        </button>
                    </div>
                </form>
                <div class="hidden text-white md:block">
                    Copyright &copy; 2022, All Rights Reserved
                </div>

            </div>




    </footer>





        @stack('modals')

        @livewireScripts
    </body>
</html>
