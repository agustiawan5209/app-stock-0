<div>
    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            {{-- <div class="flex flex-col justify-center">
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
            </div> --}}
            <div class="mt-10 grid lg:grid-cols-2 gap-x-8 gap-y-8 items-center">
                @foreach ($bahanbaku as $item)
                    <div class="w-full max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="px-3 py-2 border-gray-300 rounded-t-lg" src="{{asset('upload/'.$item->gambar)}}"
                                alt="product image">
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 underline">{{$item->bahan_baku}}</h5>
                            </a>
                            <div class="flex flex-col">
                                <div class="py-1 font-bold">Isi: {{$item->isi}}</div>
                                <div class="py-1 font-bold">Satuan: {{$item->satuan}}</div>
                                <div class="py-1 font-bold">Jumlah Stok: {{number_format($item->jumlah_stock,0,2)}}</div>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-3xl font-bold text-gray-900">Rp. {{number_format($item->harga,0,2)}}</span>
                                <a href="#"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                                    to cart</a>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>

        </div>

    </div>
    {{-- Detail Produk --}}
    {{-- <x-bahan-baku-detail :id="1" /> --}}
</div>
