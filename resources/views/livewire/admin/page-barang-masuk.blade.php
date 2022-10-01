<div>
    <x-table>
        <thead>
            <x-tr>
                <x-th>No.</x-th>
                <x-th>ID Pesanan</x-th>
                <x-th>Bahan Baku</x-th>
                <x-th>Jumlah</x-th>
                <x-th>Total</x-th>
                <x-th>Aksi</x-th>
            </x-tr>
        </thead>
        <tbody>
            @foreach ($barangmasuk as $item)
                <x-tr>
                    <x-td>{{ $loop->iteration }}</x-td>
                    <x-td>{{ $item->kode }}</x-td>
                    <x-td>{{ $item->pesanan->bahan_baku_id }}</x-td>
                    <x-td>{{ $item->pesanan->jumlah }}</x-td>
                    <x-td>{{ $item->pesanan->sub_total }}</x-td>
                    <x-td>
                        <ul class="flex justify-around">
                            <button wire:click='deleteModal({{ $item->id }})'><svg class="w-6 h-6 text-red-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg></button>
                            <button wire:click='EditModal({{ $item->id }})'><svg class="w-6 h-6 text-green-500"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg></button>
                        </ul>
                    </x-td>
                </x-tr>
            @endforeach
        </tbody>
    </x-table>
</div>
