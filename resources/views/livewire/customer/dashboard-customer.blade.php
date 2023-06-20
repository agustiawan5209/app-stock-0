<div>
    <section class=" container mt-10 mx-auto">
        @include('sweetalert::alert')
        <div class="grid gap-6 mb-8 md:grid-cols-2 ">
            <!-- Card -->
            @foreach ($data as $item)
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                    <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                        <svg class="w-6 h-6 text-primary " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-xs font-medium text-gray-600 ">
                            Jumlah Stok {{ $item->jenis }}
                        </p>
                        <p class="text-lg font-semibold text-gray-700 ">
                            {{ $item->jumlah_produksi }} Botol
                        </p>
                    </div>
                </div>
            @endforeach
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full      ">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 ">
                        Total Pembelian Bulan Ini
                    </p>
                    <p class="text-lg font-semibold text-gray-700 ">
                        Rp. {{ number_format($pembelian, 0, 2) }}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="hero min-h-max bg-base-200">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-5xl font-bold">Selamat Datang {{ Auth::user()->name }}</h1>
                <p class="py-6">UD. Mega Buana adalah perusahaan yang bergerak dalam industri pengolahan markisa. UD.
                    Mega Buana pertama kali didirikan oleh Bapak IdrisHusain, SE. Nama UD. Mega Buana terdiri dari dua
                    kata yaitu mega yang berarti besar dan buana yang berarti bumi.</p>
                <a href="{{ route('Customer.Pesan-Produk') }}">
                    <button class="btn btn-primary">Lihat Produk</button></a>
            </div>
        </div>
    </div>
</div>
