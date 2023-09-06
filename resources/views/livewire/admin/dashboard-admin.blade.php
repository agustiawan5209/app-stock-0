<section class=" container mt-10">

    <div class="grid gap-6 mb-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
        <!-- Card -->
        <div class="flex items-center p-4  rounded-lg shadow-xs bg-gradient-to-b from-neutral to-ungu wow slideInDown" data-wow-duration="1000ms" data-wow-delay=500ms>
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full ">
                <svg class="w-6 h-6 text-primary " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm  text-black font-semibold font-mono ">
                    Total Produksi
                </p>
                <p class="text-lg font-semibold text-white">
                    {{$total_produksi}} Liter
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4  rounded-lg shadow-xs bg-gradient-to-b from-neutral to-ungu wow slideInDown" data-wow-duration="1000ms" data-wow-delay=600ms>
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full      ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm  text-white font-semibold font-mono ">
                    Pembelian Bahan Baku
                </p>
                <p class="text-lg font-semibold text-white">
                    Rp. {{ number_format($total_pembelian,0,2) }}
                </p>
            </div>
        </div>
        <!-- Card -->
        <div class="flex items-center p-4  rounded-lg shadow-xs bg-gradient-to-b from-neutral to-ungu wow slideInDown" data-wow-duration="1000ms" data-wow-delay=700ms>
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full      ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm  text-white font-semibold font-mono ">
                   Total Penjualan Produk
                </p>
                <p class="text-lg font-semibold text-white">
                    Rp. {{ number_format($total_penjualan,0,2) }}
                </p>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 container mx-auto">
        @if ($stok['kemasan']->count() > 0 || $stok['produksi']->count() > 0)
            @if ($stok['produksi']->count() > 0)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Bahan Baku Produksi!</h2>
                        <ul class="menu menu-compact lg:menu-normal bg-base-100 w-full p-2 rounded-box">
                            @foreach ($stok['produksi'] as $item)
                                <li class="mb-1 wow slideInLeft" data-wow-delay="50{{ $item->id }}ms" data-wow-duration="1s">
                                    <div class="alert alert-error shadow-lg">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current flex-shrink-0 h-6 w-6 text-white" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-white">{{ $item->bahanbaku->nama_bahan_baku }} : Jumlah
                                                Stok = {{ $item->stock.'/'. $item->satuan->nama_satuan }}</span>

                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if ($stok['kemasan']->count() > 0)
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title">Bahan Baku Kemasan!</h2>
                        <ul class="menu menu-compact lg:menu-normal bg-base-100 w-full p-2 rounded-box">

                            @foreach ($stok['kemasan'] as $item)
                                <li class="mb-1 wow slideInLeft" data-wow-delay="50{{ $item->id }}ms" data-wow-duration="1s">
                                    <div class="alert alert-error shadow-lg">
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="stroke-current flex-shrink-0 h-6 w-6 text-white" fill="none"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-white">{{ $item->bahanbaku->nama_bahan_baku }} : Jumlah
                                                Stok =
                                                {{ $item->stock .'/'. $item->satuan->nama_satuan}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

        @endif
    </div>

</section>
