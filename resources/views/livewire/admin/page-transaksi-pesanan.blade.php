<div>
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
                @foreach ($pesanan as $item)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        <x-td>{{ $item->id }}</x-td>
                        <x-td>{{ $item->bahan_baku_id }}</x-td>
                        <x-td>{{ $item->jumlah }}</x-td>
                        <x-td>{{ $item->sub_total }}</x-td>
                        <x-td>
                            @include('items.td-action', ['id'=> $item->id])
                         </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>

</div>
