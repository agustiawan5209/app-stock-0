<div>
    @include('sweetalert::alert')
    <div class="py-2 px-4 ">
        {{-- @if ($StockKurang != null)
                    @foreach ($StockKurang as $item)
                        <div class="flex items-center bg-yellow-300 text-white text-sm font-bold px-4 py-3" role="alert"
                            wire:click='closeAlert'>
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p> Stock Pada Bahan Baku {{ $item->default_stock->bahan_baku }} </p>
                        </div>
                    @endforeach
                @endif
                @if ($StockKurangAir != null)
                    @foreach ($StockKurangAir as $item)
                        <div class="flex items-center bg-yellow-300 text-white text-sm font-bold px-4 py-3" role="alert"
                            wire:click='closeAlert'>
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            <p>{{ $item->default_bahan_air->bahan_baku }}</p>
                        </div>
                    @endforeach
                @endif --}}
        {{-- Modal Insert Item --}}
        <div class="">
            <!-- Add Item Modal -->
            <x-jet-dialog-modal wire:model.defer="modal" maxWidth='md'>
                <form>
                    @csrf
                    <x-slot name="title">
                        {{ __('Tambahlan Bahan Baku') }}
                        <x-jet-validation-errors />
                    </x-slot>

                    <x-slot name='content'>
                        <div class="mb-4">
                            <x-jet-label for="gambar">Gambar</x-jet-label>
                            @if ($ItemId == null)
                                <x-jet-input type='file' wire:model.defer='gambar' />
                            @else
                                <x-jet-input type='file' wire:model.defer='photo' />
                                <span class="text-gray-500 text-sm">kosongkan jika tidak di ubah</span>
                            @endif
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="bahan_id">Bahan Baku</x-jet-label>
                            <x-jet-input wire:model.defer='bahan_id'  />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="isis">Satuan</x-jet-label>
                            <x-jet-input wire:model="satuan_id" />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="isis">Isi</x-jet-label>
                            <x-jet-input wire:model.defer='isi' />
                        </div>

                        <div class="mb-4">
                            <x-jet-label for="isis">Harga</x-jet-label>
                            <x-jet-input wire:model.defer='harga' />
                        </div>
                        <div class="mb-4">
                            <x-jet-label for="isis">Jumlah Stock</x-jet-label>
                            <x-jet-input wire:model.defer='jumlah_stock' />
                        </div>
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-danger-button wire:click="CloseModal" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-danger-button>
                        @if ($ItemId == null)
                            <x-jet-button wire:click.prevent="create()" name="simpan" type="button">
                                {{ __('Tambah Data') }}
                            </x-jet-button>
                        @else
                            <x-jet-button wire:click.prevent="edit({{ $ItemId }})" name="simpan" type="button">
                                {{ __('Edit Data') }}
                            </x-jet-button>
                        @endif
                    </x-slot>
                </form>
            </x-jet-dialog-modal>
            <x-jet-confirmation-modal wire:model='itemDelete'>
                <x-slot name="title"></x-slot>
                <x-slot name="content">
                    Apakah Anda Yakin?
                </x-slot>
                <x-slot name="footer">
                    <x-jet-danger-button wire:click="CloseModal" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                        </x-jet-button>
                        <x-jet-button wire:click.prevent="delete({{$ItemId}})" name="simpan" type="button">
                            {{ __('Hapus Data') }}
                        </x-jet-button>
                </x-slot>
            </x-jet-confirmation-modal>
        </div>

        <div class=" container lg:px-4 md:px-2 sm:px1">
            @if ($bahanbaku != null)
            <x-table
            class="stripe hover w-full whitespace-no-wrap mt-10 shadow-sm px-2 border-separate border-white"
            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                <x-tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                    <x-th class="font-semibold p-2 text-center text-dark">No</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">gambar</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">Bahan Baku</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">isi</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">Satuan</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">Harga</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">Jumlah Stock</x-th>
                    <x-th class="font-semibold p-2 text-center text-dark">Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>@php
                $no = 1;
            @endphp
                @foreach ($bahanbaku as $item)
                    <x-tr
                        class="text-xs font-medium tracking-wide text-left text-black  border-b   bg-white"
                        wire:loading.class.delay.500ms='opacity-50'>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            {{ $no++ }}
                        </x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            <img width="100" src="{{ asset('upload/' . $item->gambar) }}"
                                alt="Image Bahan Baku">
                        </x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            {{ $item->bahan_baku }}</x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            {{ $item->isi }}
                        </x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            {{ $item->satuan }}
                        </x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">Rp.
                            {{ number_format($item->harga, 0, 2) }}</x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            {{ $item->jumlah_stock }}</x-td>
                        <x-td class="border border-gray-100 text-xs bg-white text-center">
                            @include('items.td-action', ['id' => $item->id])
                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>

        </x-table>
            @endif
            <hr class="w-full h-16 bg-white stroke-1 stroke-current ">
            {{-- @if ($bahanAir != null)
            <div class="w-full h-auto px-2 py-2 bg-green-200 rounded-sm overflow-x-auto">
                <h3 class="bg-white px-2 p-2 lg:px-4 lg:py-4 font-normal text-gray-600">Tabel Bahan Baku Produksi Air
                </h3>
                <table class="stripe hover w-full whitespace-no-wrap mt-10 shadow-sm px-2 border-collapse border-white"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                        <tr>
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">gambar</th>
                            <th class="px-4 py-3">Bahan Baku</th>
                            <th class="px-4 py-3">Satuan</th>
                            <th class="px-4 py-3">Harga</th>
                            <th class="px-4 py-3">Jumlah Stock</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp

                    </tbody>

                </table>

            </div>
        @endif --}}
        </div>
    </div>
</div>
<!-- component -->

</div>
