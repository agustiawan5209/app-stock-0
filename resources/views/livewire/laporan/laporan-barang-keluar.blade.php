<div>
    <div class="bg-white w-full">
        <x-jet-validation-errors />
        <div class="px-3 py-2 md:py-4">
            <form action="{{ $cetak == true ? route('Admin.cetakbarangkeluar') : '#' }}" action="GET"
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
                    <div class="flex col-span-2"><button type="submit" class="btn btn-info">
                            <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6">
                                    <path fill-rule="evenodd"
                                        d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            Cetak
                        </button></div>
                @endif
            </form>
        </div>
    </div>
    <x-table :tambahItem="false"
        class="table-bk text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50   "
        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
        <thead class="w-full whitespace-no-wrap">
            <x-tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-300">
                <x-th class="text-semibold p-0 text-center bg-white text-sm">No</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Kode Barang Keluar
                </x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Alamat/Tujuan</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Customer</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Jenis</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Jumlah Pembelian</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Sub Total</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-sm">Transaksi </x-th>
            </x-tr>
        </thead>
        <tbody>
            @foreach ($barangkeluar as $item)
                <x-tr class="text-gray-700 ">
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        {{ $loop->iteration }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center  text-red-500">
                        {{ $item->kode_barang_keluar }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        {{ $item->alamat_tujuan }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        {{ $item->customer }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        {{ $item->jenis->nama_jenis }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->jumlah }}
                    </x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        Rp. {{ number_format($item->sub_total, 0, 2) }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center ">
                        {{ $item->tgl_keluar }}</x-td>

                </x-tr>
            @endforeach
        </tbody>
    </x-table>
</div>
