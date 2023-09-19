<div>
    <div class="bg-white">
        <x-jet-dialog-modal wire:model="itemStatus">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <x-statuspage :id="$itemID" :jenis="2" />
                @if ($status != 5)
                    <form action="" class="w-full">
                        <label class="input-group input-group-vertical my-2">
                            <span class="bg-neutral font-semibold text-lg">Keterangan</span>
                            <textarea class="textarea textarea-bordered h-40" wire:model="ket" id="ket" cols="10" rows="10"></textarea>
                        </label>
                    </form>
                @endif
            </x-slot>
            <x-slot name="footer">
                @if ($status != 5)
                    <button type="button" class="btn btn-nebg-neutral"
                        wire:click="updateStatus({{ $itemID }})">Simpan</button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
        <x-table :tambahItem="true" class="bg-white">
            <thead>
                <x-tr>
                    <x-th>No.</x-th>
                    <x-th>ID Pesanan</x-th>
                    <x-th>Ukuran Produk</x-th>
                    <x-th>Jumlah</x-th>
                    <x-th>Status</x-th>
                    <x-th>Total</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($pesan as $pesanan)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $pesanan->transaksi->ID_transaksi }}</x-td>
                        @if ($pesanan->jenis !== null)
                            <x-td>{{ $pesanan->jenis->nama_jenis }}</x-td>
                        @else
                            <x-td>{{ $pesanan->nama_jenis }}</x-td>
                        @endif
                        <x-td>{{ $pesanan->jumlah }}</x-td>
                        <x-td>
                            <button type="button" class="btn btn-accent"
                                wire:click="statusModal({{ $pesanan->id }})">{{ $pesanan->statusJenis($pesanan->status) }}</button>
                        </x-td>
                        <x-td>Rp. {{ number_format($pesanan->sub_total, 0, 2) }}</x-td>
                        <x-td>
                            <button wire:click='statusModal({{ $pesanan->id }})'
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
                            <button wire:click='deleteModal({{ $pesanan->id }})'
                                class="p-1 text-white  bg-error  rounded">
                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</div>
