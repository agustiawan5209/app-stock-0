@can('Manage-Admin', User::class)
    <a class="  {{ request()->routeIs('Admin.Dashboard-Admin') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 ' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} "
        href="{{ route('Admin.Dashboard-Admin') }}">
        <svg class="h-5 w-5 {{ request()->routeIs('Admin.Dashboard-Admin') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>

        </svg>
        <span>Dashboard</span>
    </a>
    <a class="  {{ request()->routeIs('Admin.Stock-Bahan-Baku') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 ' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} "
        href="{{ route('Admin.Stock-Bahan-Baku') }}">
        <svg class="h-5 w-5 {{ request()->routeIs('Admin.Stock-Bahan-Baku') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>

        </svg>
        <span>Stock Bahan Baku</span>
    </a>
    <a class=" {{ request()->routeIs('Admin.Produk') || request()->routeIs('Admin.Jenis') || request()->routeIs('Admin.Produk-Fermentasi') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} relative  box-content"
        href="#" x-on:click="Produk = ! Produk " x-on:click.outside="Produk = false">
        <svg class="h-5 w-5 {{ request()->routeIs('Admin.Produk') || request()->routeIs('Admin.Jenis') || request()->routeIs('Admin.Produk-Fermentasi') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16">
            </path>
            <span>Master Produk</span>
        </svg>

    </a>
    <div class="-translate-x-5 m-0 !space-y-0" x-show="Produk" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-50 -translate-x-32" x-transition:enter-end="opacity-100 -translate-x-5"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-50 -translate-x-32">
        <div class="bg-white rounded-lg border border-gray-200 w-48 text-gray-900 text-sm font-medium mt-0 space-y-0">
            <a href="{{ route('Admin.Produk') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Produk') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Produk Siap Jual
            </a>

            <a href="{{ route('Admin.Produk-Fermentasi') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Produk-Fermentasi') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Produk Tahap Fermentasi
            </a>
            <a href="{{ route('Admin.Jenis') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Jenis') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Jenis Produk
            </a>
        </div>
    </div>
    <a class=" {{ request()->routeIs('Admin.Satuan')  || request()->routeIs('Admin.List-BahanBaku') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} relative  box-content"
        href="#" x-on:click="Master = ! Master " x-on:click.outside="Master = false">
        <svg class="h-5 w-5 {{ request()->routeIs('Admin.Satuan') || request()->routeIs('Admin.List-BahanBaku') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16">
            </path>
            <span>Master Data</span>
        </svg>

    </a>
    <div class="-translate-x-5 m-0 !space-y-0" x-show="Master" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-50 -translate-x-32" x-transition:enter-end="opacity-100 -translate-x-5"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
        x-transition:leave-end="opacity-50 -translate-x-32">
        <div class="bg-white rounded-lg border border-gray-200 w-48 text-gray-900 text-sm font-medium mt-0 space-y-0">
            <a href="{{ route('Admin.Satuan') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Satuan') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Satuan
            </a>
            <a href="{{ route('Admin.List-BahanBaku') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.List-BahanBaku') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Bahan Baku
            </a>
            <a href="{{ route('Admin.Supplier') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Supplier') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Data Supplier
            </a>
            <a href="{{ route('Admin.Customer') }}"
                class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Customer') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                Data Customer
            </a>
        </div>
    </div>
    <a class=" {{ request()->routeIs('Admin.Barang-Keluar') || request()->routeIs('Admin.Barang-Masuk') || request()->routeIs('Admin.Tr-Pesanan') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 pr-20' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} relative  box-content"
        href="#" x-on:click="Transaksi = ! Transaksi" x-on:click.outside="Transaksi = false">
        <svg class="h-5 w-5 {{ request()->routeIs('Admin.Barang-Keluar') || request()->routeIs('Admin.Barang-Masuk') || request()->routeIs('Admin.Tr-Pesanan+') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z">
            </path>
            <span>Transaksi</span>
        </svg>
        <div class="-translate-x-5 m-0 !space-y-0" x-show="Transaksi" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-50 -translate-x-32" x-transition:enter-end="opacity-100 -translate-x-5"
            x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-50 -translate-x-32">
            <div class="bg-white rounded-lg border border-gray-200 w-48 text-gray-900 text-sm font-medium">
                <a href="{{ route('Admin.Barang-Keluar') }}"
                    class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Barang-Keluar') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                    Barang Keluar
                </a>
                <a href="{{ route('Admin.Barang-Masuk') }}"
                    class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Barang-Masuk') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                    Barang Masuk
                </a>
                <a href="{{ route('Admin.Tr-Pesanan') }}"
                    class=" active:border-none focus:border-0 active:ring-0  {{ request()->routeIs('Admin.Tr-Pesanan') ? 'block px-4 py-2 border-b border-gray-200 w-full rounded-t-lg bg-blue-700 text-white cursor-pointer' : 'block px-4 py-2 border-b border-gray-200 w-full hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 cursor-pointer' }}">
                    Pesanan
                </a>
            </div>
        </div>
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
@endcan

@can('Manage-Supplier')
    <a class="  {{ request()->routeIs('Supplier.Dashboard-Supplier') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 ' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} "
        href="{{ route('Supplier.Dashboard-Supplier') }}">
        <svg class="h-5 w-5 {{ request()->routeIs('Supplier.Dashboard-Supplier') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>

        </svg>
        <span>Dashboard</span>
    </a>
    <a class="  {{ request()->routeIs('Supplier.Bahan-Baku') ? 'flex items-center space-x-2 py-1  font-semibold  border-r-2 border-r-indigo-700 ' : 'flex items-center space-x-2 py-1  group hover:border-r-2 hover:border-r-indigo-700 hover:font-semibold ' }} "
        href="{{ route('Supplier.Bahan-Baku') }}">
        <svg class="h-5 w-5 {{ request()->routeIs('Supplier.Bahan-Baku') ? 'stroke-indigo-700' : 'group-hover:stroke-indigo-700' }}"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>

        </svg>
        <span>Bahan Baku</span>
    </a>
@endcan
