<div>
    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            @include('sweetalert::alert')
            {{-- <div class="flex flex-col justify-center">
                <div class="relative">
                    <img class="hidden sm:block w-full"
                        src="https://i.ibb.co/HxXSY0j/jason-wang-Nx-Awry-Abt-Iw-unsplash-1-1.png" alt="sofa" />
                    <img class="sm:hidden w-full"
                        src="https://i.ibb.co/B6qwqPT/jason-wang-Nx-Awry-Abt-Iw-unsplash-1.png" alt="sofa" />
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
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 underline">
                                {{$item->bahanbaku->nama_bahan_baku}}</h5>
                        </a>
                        <div class="flex flex-col">
                            <div class="py-1 font-bold">Isi: {{$item->isi}}</div>
                            <div class="py-1 font-bold">Satuan: {{$item->satuan}}</div>
                            <div class="py-1 font-bold">Jumlah Stok: {{number_format($item->jumlah_stock,0,2)}}</div>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-3xl font-bold text-gray-900">Rp.
                                {{number_format($item->harga,0,2)}}</span>
                            <a href="#my-modal-2" class="btn btn-info" wire:click='addModal({{$item->id}})'>Buat
                                Pesanan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <x-jet-dialog-modal wire:model='itemAdd'>
            <x-slot name="title">Form Buat Pesanan</x-slot>
            <x-slot name="content">
                <table class="table justify-center">
                    <tr class=" bg-base-100 w-56">
                        <th>Bahan Baku
                        </th>
                        <th>Satuan
                        </th>
                        <th>isi
                        </th>
                        <th>harga
                        </th>
                        <th>Jumlah Stock
                        </th>
                        <th>supplier
                        </th>
                    </tr>
                    <tr>
                        <td class="border-x text-center">{{$bahan_baku}}</td>
                        <td class="border-x text-center">{{$satuan}}</td>
                        <td class="border-x text-center">{{$isi}}</td>
                        <td class="border-x text-center">{{$harga}}</td>
                        <td class="border-x text-center">{{$jumlah_stock}}</td>
                        <td class="border-x text-center">{{$supplier_id}}</td>

                    </tr>
                </table>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-error" wire:click="CloseModal">Batalkan</button>
                <button type="button" class="btn btn-primary" wire:click="kirimCekout({{$itemID}})">Buat
                    Pesanan</button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>
    {{-- Detail Produk --}}
    {{--
    <x-bahan-baku-detail :id="1" /> --}}
</div>
