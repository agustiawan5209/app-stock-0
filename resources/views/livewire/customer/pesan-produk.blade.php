<div>
    <div class="w-full  flex justify-center container overflow-x-auto mx-auto">
        <x-table :tambahItem='false' class=" table table-normal w-full">
            <thead>
                <x-tr>
                    <x-th>No.</x-th>
                    <x-th>Jenis</x-th>
                    <x-th>Harga Produk</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($jenis as $jenis)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $jenis->nama_jenis }}</x-td>
                        <x-td>Rp. {{ number_format($jenis->harga,0,2) }}</x-td>
                        <x-td>
                            <button wire:click='Pesan({{ $jenis->id }})'
                                class="p-1 text-white  bg-info  rounded">
                                Pesan
                            </button>

                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>

</div>
