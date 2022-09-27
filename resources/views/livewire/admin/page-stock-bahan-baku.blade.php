<div>
    @include('sweetalert::alert')
    <div><x-modal>
        <x-slot name="modal_dialog">
            <div class=" w-full">
                <x-jet-validation-errors />
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Nama Bahan Baku</x-jet-label>
                    <x-select wire:model="bahan_baku_id" class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($bahanbaku as $item)
                            <option value="{{$item->id}}">{{$item->nama_bahan_baku}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jenis</x-jet-label>
                    <x-select wire:model='jenis_id' class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($jenis as $item)
                            <option value="{{$item->id}}">{{$item->nama_jenis}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Satuan</x-jet-label>
                    <x-select wire:model="satuan_id" class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($satuan as $item)
                            <option value="{{$item->id}}">{{$item->nama_satuan}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jumlah Stock</x-jet-label>
                    <x-jet-input wire:model="stock" type="number" class="w-full"/>
                </div>

            </div>
        </x-slot>
        <x-slot name="modal_edit">
            <div class=" w-full">
                <x-jet-validation-errors />
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Nama Bahan Baku</x-jet-label>
                    <x-select wire:model="bahan_baku_id" class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($bahanbaku as $item)
                            <option value="{{$item->id}}">{{$item->nama_bahan_baku}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jenis</x-jet-label>
                    <x-select wire:model='jenis_id' class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($jenis as $item)
                            <option value="{{$item->id}}">{{$item->nama_jenis}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Satuan</x-jet-label>
                    <x-select wire:model="satuan_id" class="w-full">
                        <option value="">--pilih--</option>
                        @foreach ($satuan as $item)
                            <option value="{{$item->id}}">{{$item->nama_satuan}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jumlah Stock</x-jet-label>
                    <x-jet-input wire:model="stock" type="number" class="w-full"/>
                </div>
                @if ($itemID != null)
                <x-jet-button type="button" wire:click="edit({{ $itemID }})">Edit</x-jet-button>
            @endif
            </div>
        </x-slot>
        <x-slot name="modal_delete"></x-slot>
    </x-modal>
    <x-table>
        <thead>
            <x-tr>
                <x-th>NO</x-th>
                <x-th>Nama Bahan Baku</x-th>
                <x-th>Jenis</x-th>
                <x-th>Satuan</x-th>
                <x-th>Jumlah Stock</x-th>
                <x-th>Aksi</x-th>
            </x-tr>
        </thead>
        <tbody>
            @if ($stockbahanbaku->count() > 0)
                @foreach ($stockbahanbaku as $item)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $item->bahanbaku->nama_bahan_baku }}</x-td>
                        <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                        <x-td>{{ $item->satuan->nama_satuan }}</x-td>
                        <x-td>{{ $item->stock }}</x-td>
                        <x-td class="flex justify-center items-center px-2 py-0">
                            <x-button type='button' wire:click='deleteModal({{ $item->id }})'
                                class="bg-red-500 text-white">Delete</x-button>

                            <x-button type='button' wire:click='editModal({{ $item->id }})'
                                class="bg-green-500 text-white">Edit</x-button>
                        </x-td>
                    </x-tr>
                @endforeach
            @endif
        </tbody>
    </x-table></div>
</div>
