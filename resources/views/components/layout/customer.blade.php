<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
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
                    <li><a href="{{route('Customer.Pesan-Customer')}}">Diterima</a></li>
                    <li><a href="{{route('Customer.Pesan-Customer')}}">Belum Diterima</a></li>
                  </ul>
                </li>
                <li><a href="{{route('Customer.Pesan-Produk')}}">Produk</a></li>
            </ul>
          </div>
          <a class="btn btn-ghost normal-case text-xl">MegaBuan</a>
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
                <li><a href="{{route('Customer.Pesan-Customer')}}">Diterima</a></li>
                <li><a href="{{route('Customer.Pesan-Customer')}}">Belum Diterima</a></li>
              </ul>
            </li>
            <li><a href="{{route('Customer.Pesan-Produk')}}">Produk</a></li>
          </ul>
        </div>
        <div class="navbar-end">
          <a class="btn">Logout</a>
        </div>
      </div>
      <main>
        {{$slot}}
      </main>
    @stack('modals')

    @livewireScripts

    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
