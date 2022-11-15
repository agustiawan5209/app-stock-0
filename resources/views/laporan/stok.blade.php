@extends('laporan.layout')
@section('title', 'Laporan Stok bahan Baku')
@section('content')
    <x-table :tambahItem="false">
        <thead>
            <x-tr>
                <x-th class=" border !border-black">NO</x-th>
                <x-th class=" border !border-black">Nama Bahan Baku</x-th>
                <x-th class=" border !border-black">Satuan</x-th>
                <x-th class=" border !border-black">Jumlah Stock</x-th>
            </x-tr>
        </thead>
        <tbody>
            @if ($data['produksi']->count() > 0)
                @foreach ($data['produksi'] as $item)
                    <x-tr>
                        <x-td class="border !border-black">{{ $loop->iteration }}</x-td>
                        <x-td class="border !border-black">
                            @if ($item->bahanbaku == null)
                                Bahan Baku Terhapus
                            @else
                                {{ $item->bahanbaku->nama_bahan_baku }}
                            @endif
                        </x-td>
                        <x-td class="border !border-black">{{ $item->satuan->nama_satuan }}</x-td>
                        <x-td class="border !border-black">{{ $item->stock }}</x-td>
                    </x-tr>
                @endforeach
                @foreach ($data['kemasan'] as $item)
                    <x-tr>
                        <x-td class="border !border-black">{{ $loop->iteration }}</x-td>
                        <x-td class="border !border-black">
                            @if ($item->bahanbaku == null)
                                Bahan Baku Terhapus
                            @else
                                {{ $item->bahanbaku->nama_bahan_baku }}
                            @endif
                        </x-td>
                        <x-td class="border !border-black">{{ $item->satuan->nama_satuan }}</x-td>
                        <x-td class="border !border-black">{{ $item->stock }}</x-td>
                    </x-tr>
                @endforeach
            @endif
        </tbody>
    </x-table>
@endsection
