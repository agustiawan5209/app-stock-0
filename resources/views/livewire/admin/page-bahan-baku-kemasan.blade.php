<main>
    @include('sweetalert::alert')
    <!-- component -->
    <section>
        <x-table>
            <thead>
                <x-tr>
                    <x-th>NO</x-th>
                    <x-th>Nama Jenis</x-th>
                    <x-th></x-th>
                </x-tr>
            </thead>
            <tbody>
                @if ($bahan->count() > 0)
                    @foreach ($bahan as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->nama_bahan_baku }}</x-td>
                            <x-td>
                                @include('items.td-action', ['id'=> $item->id])
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

        <x-jet-confirmation-modal wire:model='itemDelete'>
            <x-slot name="title">
                Delete Bahan Baku
            </x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <x-jet-button type="button" wire:click="$toggle('itemDelete')">Tutup</x-jet-button>
                <x-jet-danger-button type="button" wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
        @if ($itemEdit)
            <x-jet-dialog-modal wire:model='itemEdit'>
                <x-slot name="title">
                    Edit Bahan Baku
                </x-slot>
                <x-slot name="content">
                    <div class="flex justify-center my-2 mx-4 md:mx-0">
                        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Nama Bahan Baku</label>
                                    <input
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        type='text' wire:model='nama_bahan_baku' required>
                                </div>
                                <div class="flex items-center w-full mt-2">
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                            type="button" wire:click="$toggle('itemEdit')">
                                            Tutup
                                        </button>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class="appearance-none flex items-center justify-center w-full bg-blue-100 text-blue-700 shadow border border-blue-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-200 hover:text-blue-700 focus:outline-none"
                                            type="button" wire:click="edit({{ $itemID }})">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-jet-dialog-modal>
        @endif
        @if ($itemAdd)
            <x-jet-dialog-modal wire:model='itemAdd'>
                <x-slot name="title">
                    Edit Bahan Baku
                </x-slot>
                <x-slot name="content">
                    <div class="flex justify-center my-2 mx-4 md:mx-0">
                        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Nama Bahan Baku</label>
                                    <input
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        type='text' wire:model='nama_bahan_baku' required>
                                </div>
                                <div class="flex items-center w-full mt-2">
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                            type="button" wire:click="$toggle('itemAdd')">
                                            Tutup
                                        </button>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class="appearance-none flex items-center justify-center w-full bg-blue-500 text-blue-700 shadow border border-blue-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-200 hover:text-blue-700 focus:outline-none"
                                            type="button" wire:click="create()">
                                            Tambah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-jet-dialog-modal>
        @endif
    </div>

</main>
