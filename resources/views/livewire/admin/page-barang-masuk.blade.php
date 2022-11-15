<div>
    <x-table :tambahItem="false">
        <thead>
            <x-tr>
                <x-th>No.</x-th>
                <x-th>ID Pesanan</x-th>
                <x-th>Supplier</x-th>
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
                    <x-td>
                        @if ($item->supplier == null)
                            Supplier Hilang
                        @else
                        {{ $item->supplier->supplier }}
                        @endif
                    </x-td>
                    <x-td>
                        @if ($item->pesanan->jenis == 1)
                            @if ($item->pesanan->bahanbaku == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbaku->bahanbaku->nama_bahan_baku }}
                            @endif
                        @elseif($item->pesanan->jenis == 2)
                            @if ($item->pesanan->bahanbakuKemasan == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbakuKemasan->bahanbakuKemasan->nama_bahan_baku }}
                            @endif
                        @endif
                    </x-td>
                    <x-td>{{ $item->pesanan->jumlah }}</x-td>
                    <x-td>Rp. {{ number_format($item->pesanan->sub_total,0,2) }}</x-td>
                    {{-- <x-td>
                        @include('items.td-action', ['id' => $item->id])
                    </x-td> --}}
                </x-tr>
            @endforeach
        </tbody>
    </x-table>
</div>
