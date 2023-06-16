<div>
    <div class="w-full  flex justify-center container overflow-x-auto mx-auto">
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
                            @else
                                <button wire:click='Pesan({{ $item->id }})' class="p-1 text-white  bg-info  rounded">
                                    Pesan
                                </button>
                            @endif
                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>

</div>
