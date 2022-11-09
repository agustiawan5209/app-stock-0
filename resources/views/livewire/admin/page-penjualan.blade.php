<div>
    <x-table  :tambahItem="false">
        <x-tr>
            <x-th>No</x-th>
            <x-th>Nama Pembeli</x-th>
            <x-th>No. Telpon</x-th>
            <x-th>Jenis Produk</x-th>
            <x-th>Jumlah</x-th>
            <x-th>Sub Total</x-th>
            <x-th>Status</x-th>
            <x-th>Aksi</x-th>
        </x-tr>
        @foreach ($pesan as $item)
            <x-tr>
                <x-td>{{ $loop->iteration }}</x-td>
                @if ($item->user == null)
                    <x-td colspan='2'>User Kosong</x-td>
                @else
                    <x-td>{{ $item->user->name }}</x-td>
                    <x-td>{{ $item->user->no_telpon }}</x-td>
                @endif
                <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                <x-td>{{ $item->jumlah }}</x-td>
                <x-td>{{ number_format($item->sub_total, 0, 2) }}</x-td>
                <x-td>
                   <span class="badge-warning px-3 py-1 rounded-lg text-gray-800">{{$item->statusJenis($item->status)}}</span>
                </x-td>
                <x-td>
                    <div class="flex space-x-1 justify-around">
                        <a href="#" wire:click="detailModal({{ $item->id }})"
                            class="p-1 text-white bg-info  rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                              </svg>

                        </a>

                    </div>

                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>
