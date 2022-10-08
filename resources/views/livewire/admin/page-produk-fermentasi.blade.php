<main>
    @include('sweetalert::alert')
    <!-- component -->
    <section>
        <x-table>
            <thead>
                <x-tr>
                    <x-th>NO</x-th>
                    <x-th>Kode</x-th>
                    <x-th>jumlah</x-th>
                    <x-th>Tanggal fermentasi</x-th>
                    <x-th>Jumlah Hari</x-th>
                    <x-th>Status</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @if ($produk->count() > 0)
                    @foreach ($produk as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->kode }}</x-td>
                            <x-td>{{ $item->jumlah_stock }}</x-td>
                            @php
                                $carbon = \Carbon\Carbon::now()->format('Y-m-d');
                                $second = \Carbon\Carbon::createFromDate($item->tgl_frementasi);
                            @endphp
                            <x-td>{{ $item->tgl_frementasi }}</x-td>
                            <x-td>{{ $second->diffInDays($carbon) }} Hari</x-td>
                            <x-td>{{ $item->getFermentasi($item->status) }}</x-td>
                            <x-td class="flex justify-center items-center px-2 py-0">
                                <x-button type='button' wire:click='deleteModal({{ $item->id }})'
                                    class="bg-red-500 text-white">Delete</x-button>

                                <x-button type='button' wire:click='editModal({{ $item->id }})'
                                    class="bg-green-500 text-white">Edit</x-button>
                            </x-td>
                        </x-tr>
                    @endforeach
                @else
                    <x-tr>
                        <x-td colspan="3">Data Kosong</x-td>
                    </x-tr>
                @endif
            </tbody>
        </x-table>
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
