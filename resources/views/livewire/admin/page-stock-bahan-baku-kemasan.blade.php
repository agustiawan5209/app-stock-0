<div>
    @include('sweetalert::alert')
    <div>
        <a href="{{route('Admin.List-BahanBaku-Kemasan')}}" class="btn btn-warning mt-3" >List Bahan Baku</a>

        <x-modal :itemEdit="$itemEdit" :itemID="$itemID">
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
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jumlah Penggunaan Dalam Satu Kali Produksi</x-jet-label>
                    <x-jet-input wire:model="max" type="number" class="w-full"/>
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
                <div class="mb-4 w-full">
                    <x-jet-label for="bahan_baku">Jumlah Penggunaan Dalam Satu Kali Produksi</x-jet-label>
                    <x-jet-input wire:model="max" type="number" class="w-full"/>
                </div>

            </div>
        </x-slot>
        <x-slot name="modal_delete">

        </x-slot>
    </x-modal>
    <x-table :tambahItem="true">
        <thead>
            <x-tr>
                <x-th>NO</x-th>
                <x-th>Nama Bahan Baku</x-th>
                <x-th>Satuan</x-th>
                <x-th>Jumlah Stock</x-th>
                <x-th>Jumlah Penggunaan</x-th>
                <x-th>Aksi</x-th>
            </x-tr>
        </thead>
        <tbody>
            @if ($stockbahanbaku->count() > 0)
                @foreach ($stockbahanbaku as $item)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>
                            @if ($item->bahanbaku == null)
                                Bahan Baku Terhapus
                                @else
                                {{$item->bahanbaku->nama_bahan_baku}}
                            @endif
                        </x-td>
                        <x-td>{{ $item->satuan->nama_satuan }}</x-td>
                        <x-td>{{ $item->stock }}</x-td>
                        <x-td>{{ $item->max }}</x-td>
                        <x-td>
                            @include('items.td-action', ['id'=> $item->id])
                         </x-td>
                    </x-tr>
                @endforeach
            @endif
        </tbody>
    </x-table></div>
</div>
