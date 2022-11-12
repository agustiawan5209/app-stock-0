<div class="animate__animated animate__fadeIn">
    @include('sweetalert::alert')
    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
        <x-jet-dialog-modal wire:model="itemEdit">
            <x-slot name="title">Form Edit</x-slot>
            <x-slot name="content">
                <x-jet-validation-errors />
                <form action="#">
                    <div class="mb-4">
                        <x-jet-label for="nama">Nama Supplier</x-jet-label>
                        <x-jet-input type="text" class="input" wire:model="nama_supplier" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="lala">Alamat</x-jet-label>
                        <x-jet-input type="text" class="input" wire:model="alamat" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="no_telpon">Nomor Telepon</x-jet-label>
                        <x-jet-input type="text" class="input" wire:model="no_telpon" />
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="$toggle('itemEdit')">Batal</x-jet-danger-button>
                <x-jet-button wire:click="edit({{ $itemID }})">Simpan</x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        <div class="w-full overflow-hidden">
            <div class="w-full overflow-auto">
                <x-table :tambahItem='false' class="stripe hover w-full whitespace-no-wrap"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50">
                        <x-tr class="bg-gray-300 text-dark">
                            <x-th>No</x-th>
                            <x-th>supplier</x-th>
                            <x-th>Nomor Telepon</x-th>
                            <x-th>Alamat</x-th>
                            <x-th>Action</x-th>
                        </x-tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $item)
                            <x-tr>
                                <x-td class=" border border-gray-100 text-center ">{{ $loop->iteration }}</x-td>
                                <x-td class=" border border-gray-100 text-center ">{{ $item->supplier }}</x-td>
                                <x-td class=" border border-gray-100 text-center ">{{ $item->user->no_telpon }}</x-td>
                                <x-td class=" border border-gray-100 text-center "
                                    class="text-xs whitespace-pre-wrap w-48">{{ $item->user->alamat }}</x-td>
                                <x-td>
                                    <button wire:click='editModal({{ $item->id }})'
                                        class="px-1 py-2 text-green-500 text-sm font-semibold"><svg class="w-6 h-6"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
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

    </div>
</div>
