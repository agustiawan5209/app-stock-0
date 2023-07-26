<div>
    @include('sweetalert::alert')
    <div class="w-full  flex justify-center container overflow-x-auto mx-auto">
        <x-jet-dialog-modal wire:model='modalCart'>
            <x-slot name="title">
                Tambah Keranjang
            </x-slot>
            <x-slot name="content">
                <h3>Masukkan Jumlah</h3>
                <x-jet-button wire:click='countCartMinus' type="button">-</x-jet-button>
                <input type="text" class="w-18" wire:model='countCart' />
                <x-jet-button wire:click='countCartPlus' type="button">+</x-jet-button>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button type="button" wire:click="closeModal" class="text-lg text-white">Tutup</x-jet-button>
                <x-jet-button type="button" wire:click="Keranjang({{ $itemCart }})" class="text-lg text-white bg-info">Masukkan Ke Keranjang</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
        <x-table :tambahItem='false' class=" table table-normal w-full">
            <thead>
                <x-tr>
                    <x-th>No.</x-th>
                    <x-th>Jenis</x-th>
                    <x-th>Harga Produk</x-th>
                    <x-th>Stok Produk</x-th>

                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($jenis as $item)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $item->nama_jenis }}</x-td>
                        <x-td>Rp. {{ number_format($item->harga, 0, 2) }}</x-td>
                        @if ($item->stokproduk == null)
                            <x-td> Kosong </x-td>
                        @else
                            <x-td>{{ $item->stokproduk->jumlah_produksi }}</x-td>
                        @endif
                        <x-td>
                            @if ($item->stokproduk == null)
                                <button class="p-1 text-white  bg-info  rounded cursor-not-allowed opacity-70">
                                    Pesan
                                </button>
                                <button  class="p-1 text-white  bg-info  rounded">
                                    Keranjang
                                </button>
                            @else
                                <button wire:click='Pesan({{ $item->id }})' class="p-1 text-white  bg-info  rounded">
                                    Pesan
                                </button>
                                <button wire:click='openCart({{ $item->id }},{{ $item->stokproduk->jumlah_produksi }})' class="p-1 text-white  bg-info  rounded">
                                    Keranjang
                                </button>
                            @endif
                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>

</div>
