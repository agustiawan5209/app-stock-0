<div>
    <div>
        <x-table :tambahItem="true">
            <thead>
                <x-tr>
                    <x-th>No.</x-th>
                    <x-th>ID Pesanan</x-th>
                    <x-th>Bahan Baku</x-th>
                    <x-th>Jumlah</x-th>
                    <x-th>Total</x-th>
                    <x-th>Status</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $pesanana)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $pesanana->transaksi->ID_transaksi }}</x-td>
                        <x-td>{{ $pesanana->bahanbaku->nama_bahan_baku }}</x-td>
                        <x-td>{{ $pesanana->jumlah }}</x-td>
                        <x-td>{{ $pesanana->sub_total }}</x-td>
                        <x-td>
                            @if ($pesanana->barangmasuk->status == 1)
                                <option value="2">Konfirmasi</option>
                            @endif
                            @if ($pesanana->barangmasuk->status == 2)
                                <option value="3">Pengiriman Barang</option>
                            @endif
                            @if ($pesanana->barangmasuk->status == 3)
                                <option value="4">Barang Diterima</option>
                            @endif
                        </x-td>
                        <x-td>
                            <button wire:click='detailModal({{ $pesanana->id }})'
                                class="p-1 text-white  bg-info  rounded">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                    </path>
                                </svg>
                            </button>

                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>

</div>
