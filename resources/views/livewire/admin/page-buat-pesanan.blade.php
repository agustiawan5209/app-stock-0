<div>
    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            <div class="flex flex-col justify-center">
                <div class="relative">
                    <img class="hidden sm:block w-full"
                        src="https://i.ibb.co/HxXSY0j/jason-wang-Nx-Awry-Abt-Iw-unsplash-1-1.png" alt="sofa" />
                    <img class="sm:hidden w-full" src="https://i.ibb.co/B6qwqPT/jason-wang-Nx-Awry-Abt-Iw-unsplash-1.png"
                        alt="sofa" />
                    <div
                        class="absolute sm:bottom-8 bottom-4 pr-10 sm:pr-0 left-4 sm:left-8 flex justify-start items-start">
                        <p class="text-3xl sm:text-4xl font-semibold leading-9 text-white">Range Comfort Sofas</p>
                    </div>
                </div>
            </div>
            <div class="mt-10 grid lg:grid-cols-2 gap-x-8 gap-y-8 items-center">
                @foreach ($bahanbaku as $item)
                    <div
                        class="group group-hover:bg-opacity-60 transition duration-500 relative bg-gray-50  drop-shadow-sm shadow-inner sm:p-28 py-36 px-10 flex justify-center items-center">
                        <img class="group-hover:opacity-60 transition duration-500"
                            src="{{ asset('upload/' . $item->gambar) }}" alt="sofa-2" />
                        <div
                            class="absolute sm:top-8 top-4 left-4 sm:left-8 flex justify-start items-start flex-col space-y-2">
                            <div>
                                <p
                                    class="group-hover:opacity-60 transition duration-500 text-xl leading-5 text-gray-600 dark:text-white">
                                    {{ $item->bahan_baku }}</p>
                            </div>
                            <div>
                                <p
                                    class="group-hover:opacity-60 transition duration-500 text-xl font-semibold leading-5 text-gray-800 dark:text-white">
                                    Rp. {{ number_format($item->harga, 0, 2) }}</p>
                            </div>
                        </div>
                        <div
                            class="group-hover:opacity-60 transition duration-500 absolute bottom-8 right-8 flex justify-start items-start flex-row space-x-2">
                            Jumlah Stock : {{ $item->jumlah_stock }}
                        </div>
                        <div
                            class="flex flex-col bottom-8 left-8 space-y-4 absolute opacity-0 group-hover:opacity-100 transition duration-500">
                            <button class="bg-gray-600 px-3 py-2 text-white rounded-md">
                                Detail

                            </button>
                            <button class="bg-gray-600 px-3 py-2 text-white rounded-md">
                                Pesan

                            </button>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>
    {{-- Detail Produk --}}
    {{-- <x-bahan-baku-detail :id="1" /> --}}
</div>
