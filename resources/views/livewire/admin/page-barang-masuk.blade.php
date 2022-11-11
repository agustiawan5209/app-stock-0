<div>
    <x-table :tambahItem="false">
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
</div>
