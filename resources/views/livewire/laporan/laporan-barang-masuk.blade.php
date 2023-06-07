<div>
    <div class="bg-white w-full">
        <x-jet-validation-errors />
        <div class="px-3 py-2 md:py-4">
            <form action="{{ $cetak == true ? route('Admin.cetakbarangmasuk') : '#' }}" action="GET"
                class="grid grid-cols-12 gap-3 relative w-full">
                @csrf
                <div class="flex col-span-3">
                    <x-jet-label for="tgl_mulai">Tgl awal</x-jet-label>
                    <x-jet-input type="date" name="tgl_awal" wire:model="tgl_awal" />
                </div>
                <div class="flex col-span-3">
                    <x-jet-label for="tgl_akhir">Tgl Akhir</x-jet-label>
                    <x-jet-input type="date" name="tgl_akhir" wire:model="tgl_akhir" />
                </div>
                <div class="flex col-span-2"><button type="button" class="btn btn-info" wire:click='cetakAl'>
                        Cari</button></div>
                @if ($cetak)
                    <div class="flex col-span-2">
                        <button type="submit" class="btn btn-info">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Cetak
                        </button>
                    </div>
                @endif
            </form>
        </div>
    </div>
    <x-table :tambahItem="false">
        <thead>
            <x-tr>
                <x-th>No.</x-th>
                <x-th>ID Pesanan</x-th>
                <x-th>Supplier</x-th>
                <x-th>Bahan Baku</x-th>
                <x-th>Tanggal</x-th>
                <x-th>Jumlah</x-th>
                <x-th>Total</x-th>
                {{-- <x-th>Aksi</x-th> --}}
            </x-tr>
        </thead>
        <tbody>
            @foreach ($barangmasuk as $item)
                <x-tr>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $item->kode }}</x-td>
                    <x-td>
                        @if ($item->supplier == null)
                            Supplier Hilang
                        @else
                            {{ $item->supplier->supplier }}
                        @endif
                    </x-td>
                    <x-td>
                        @if ($item->pesanan->jenis == 1)
                            @if ($item->pesanan->bahanbaku == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbaku->nama_bahan_baku }}
                            @endif
                        @elseif($item->pesanan->jenis == 2)
                            @if ($item->pesanan->bahanbakuKemasan == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbakuKemasan->nama_bahan_baku }}
                            @endif
                        @endif
                    </x-td>
                    <x-td>{{ $item->pesanan->transaksi->tgl_transaksi }}</x-td>
                    <x-td>{{ $item->pesanan->jumlah }}</x-td>
                    <x-td>Rp. {{ number_format($item->pesanan->sub_total, 0, 2) }}</x-td>
                    {{-- <x-td>
                        @include('items.td-action', ['id' => $item->id])
                    </x-td> --}}
                </x-tr>
            @endforeach
        </tbody>
    </x-table>
</div>
