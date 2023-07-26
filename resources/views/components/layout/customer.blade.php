<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page }}</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <link rel="stylesheet" href="{{asset('build/assets/app.3f308fd3.css')}}">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet" />
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    @vite(['resources/js/app.js'])

    @livewireStyles
</head>

<body >
    <div class="navbar bg-neutral text-white z-[1000]">
        <div class="navbar-start">
          <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-compact dropdown-content mt-3 p-2 shadow bg-neutral text-neutral-content rounded-box w-52">
                <li><a href="{{route('Customer.Dashboard-Admin')}}">Home</a></li>
                <li tabindex="0">
                  <a>
                    Transaksi
                    <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
                  </a>
                  <ul class="p-2 bg-neutral">
                    <li><a href="{{route('Customer.Pesan-Customer', ['jenis'=> "Diterima"])}}">Diterima</a></li>
                    <li><a href="{{route('Customer.Pesan-Customer', ['jenis'=> 'BDiterima'])}}">Belum Diterima</a></li>
                  </ul>
                </li>
                <li><a href="{{route('Customer.Pesan-Produk')}}">Produk</a></li>
            </ul>
          </div>
          <a class="btn btn-ghost normal-case text-xl">{{config('app.name')}}</a>
        </div>
        <div class="navbar-center hidden lg:flex">
          <ul class="menu menu-horizontal p-0 bg-neutral text-white">
            <li><a href="{{route('Customer.Dashboard-Admin')}}">Home</a></li>
            <li tabindex="0">
              <a>
                Transaksi
                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z"/></svg>
              </a>
              <ul class="p-2 bg-neutral">
                <li><a href="{{route('Customer.Pesan-Customer', ['jenis'=> "Diterima"])}}">Diterima</a></li>
                <li><a href="{{route('Customer.Pesan-Customer', ['jenis'=> 'BDiterima'])}}">Belum Diterima</a></li>
              </ul>
            </li>
            <li><a href="{{route('Customer.Pesan-Produk')}}">Produk</a></li>
          </ul>
        </div>
        <div class="navbar-end">
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
        </div>
      </div>
      <main class=" ">
        {{$slot}}
      </main>
    @stack('modals')

    @livewireScripts

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script defer src="{{asset('build/assets/app.ab93cf8a.js')}}"></script>

    <script src="{{ asset('js/main.js') }}" defer></script>
</body>

</html>
