<div>
    <x-table>
        <thead>
            <x-tr>
                <x-th>No.</x-th>
                <x-th>ID Pesanan</x-th>
                <x-th>Bahan Baku</x-th>
                <x-th>Jumlah</x-th>
                <x-th>Total</x-th>
                {{-- <x-th>Aksi</x-th> --}}
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
                    {{-- <x-td>
                        @include('items.td-action', ['id' => $item->id])
                    </x-td> --}}
                </x-tr>
            @endforeach
        </tbody>
    </x-table>
    <x-jet-dialog-modal wire:model="itemAdd">
        <x-slot name="title">Form Tambah Barang Masuk</x-slot>
        <x-slot name="content">
            <form>
                <div class="mb-3">
                    <x-jet-label for="bahan">Pilih Bahan Baku</x-jet-label>
                    <x-select>
                        <option value="">--</option>
                        @foreach ($bahan as $bahanbaku)
                        <option value="{{$bahanbaku->id}}">{{$bahanbaku->nama_bahan_baku}}</option>
                        @endforeach
                    </x-select>
                </div>
                <div class="mb-3">
                    <x-jet-label for="bahan">Jumlah</x-jet-label>
                    <x-jet-input type="text"  name="jumlah"/>
                </div>

            </form>
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-jet-dialog-modal>
</div>
