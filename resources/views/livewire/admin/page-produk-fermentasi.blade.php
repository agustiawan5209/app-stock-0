<main>
    @include('sweetalert::alert')
    <!-- component -->
    {{-- <a href="{{route('Admin.Produk')}}" class="btn btn-warning">Produksi Dalam Botol</a> --}}
    <section>
        <div class=" w-full sm:max-w-md md:max-w-7xl border mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

                    <div class="col-span-1 border px-4 py-2 flex flex-col bg-white rounded-lg">

                        <div class=" flex flex-row justify-start">
                            <dl class="text-base md:text-xl font-medium tracking-wide">Jumlah Produksi :</dl>
                            <dt class="text-base md:text-xl font-medium tracking-wide">{{ $stokproduk->jumlah_produksi }}</dt>
                        </div>
                    </div>
            </div>
        </div>
        <x-table :tambahItem="true">
            <thead>
                <x-tr>
                    <x-th>NO</x-th>
                    <x-th>Kode</x-th>
                    <x-th>jumlah</x-th>
                    <x-th>Tanggal Produk</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @if ($produk->count() > 0)
                    @foreach ($produk as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->kode }}</x-td>
                            <x-td>{{ $item->jumlah_stock }} Liter</x-td>
                            @php
                                $carbon = \Carbon\Carbon::now()->format('Y-m-d');
                                $second = \Carbon\Carbon::createFromDate($item->tgl_frementasi);
                            @endphp
                            <x-td>{{ $item->tgl_frementasi }}</x-td>
                            <x-td>
                                <div class="flex space-x-1 justify-around">
                                    <button wire:click='deleteModal({{ $item->id }})'
                                        class="p-1 text-white  bg-error  rounded">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>

                            </x-td>
                        </x-tr>
                        @endforeach
                @else
                    <x-tr>
                        <x-td colspan="5">Data Kosong</x-td>
                    </x-tr>
                @endif
            </tbody>
        </x-table>
        <div class="bg-white w-full">
            <table class="table bg-white w-full">

            </table>
        </div>
    </section>
    <div>

        <x-jet-confirmation-modal wire:model.defer='itemDelete'>
            <x-slot name="title">
                Delete Jenis
            </x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <x-jet-button type="button" wire:click="closeModal">Tutup</x-jet-button>
                <x-jet-danger-button type="button" wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </div>

</main>
