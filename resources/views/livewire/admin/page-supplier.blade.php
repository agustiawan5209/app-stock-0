<div class="animate__animated animate__fadeIn">
    @include('sweetalert::alert')
    <div id='recipients' class=" rounded shadow bg-white">
        <x-jet-dialog-modal wire:model="addItem">
            <x-slot name="title">Form Edit</x-slot>
            <x-slot name="content">
                <x-jet-validation-errors />
                <form action="#">
                    <div class="mb-4">
                        <x-jet-label for="nama">Nama Supplier</x-jet-label>
                        <x-jet-input type="text" class="input" wire:model="nama_supplier" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="nama">Email Supplier</x-jet-label>
                        <x-jet-input type="email" class="input" wire:model="email" />
                    </div>

                    <div class="mb-4">
                        <x-jet-label for="lala">Alamat</x-jet-label>
                        <x-jet-input type="text" class="input" wire:model="alamat" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="no_telpon">Nomor Telepon</x-jet-label>
                        <x-jet-input type="tel" class="input" name="no_telpon" wire:model="no_telpon" />
                    </div>
                    <div class="mb-4">
                        <x-jet-label for="nama">password Supplier</x-jet-label>
                        <x-jet-input type="password" class="input" wire:model="password" />
                    </div>
                </form>
            </x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="clear()">Batal</x-jet-danger-button>
                @if ($itemEdit)
                    <x-jet-button wire:click="edit({{ $itemID }})">Simpan</x-jet-button>
                @else
                    <x-jet-button wire:click="create()">Tambah</x-jet-button>
                @endif
            </x-slot>
        </x-jet-dialog-modal>
        <x-jet-confirmation-modal wire:model="itemDelete">
            <x-slot name="title">Apakah Anda Yakin?</x-slot>
            <x-slot name="content"></x-slot>
            <x-slot name="footer">
                <x-jet-danger-button wire:click="clear()">Batal</x-jet-danger-button>
                <x-jet-button wire:click="delete({{ $itemID }})">Hapus</x-jet-button>

            </x-slot>
        </x-jet-confirmation-modal>
        <div class="w-full overflow-hidden">
            <div class="w-full overflow-auto">
                <x-table :tambahItem='true' class="stripe hover w-full whitespace-no-wrap"
                    style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
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
                                    @include('items.td-action', ['id' => $item->id])
                                </x-td>
                            </x-tr>
                        @endforeach
                    </tbody>

                </x-table>
            </div>
        </div>

    </div>
</div>
