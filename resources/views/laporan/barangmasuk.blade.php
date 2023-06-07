@extends('laporan.layout')
@section('title', 'Laporan Barang Masuk')
@section('content')
    <x-table :tambahItem="false">
        <thead>
            <x-tr>
                <x-th class=" border border-black">No.</x-th>
                <x-th class=" border border-black">ID Pesanan</x-th>
                <x-th class=" border border-black">Supplier</x-th>
                <x-th class=" border border-black">Bahan Baku</x-th>
                <x-th class=" border border-black">Jumlah</x-th>
                <x-th class=" border border-black">Tanggal Transaksi</x-th>
                <x-th class=" border border-black">Total</x-th>
                {{-- <x-th>Aksi</x-th> --}}
            </x-tr>
        </thead>
        <tbody>
            @foreach ($barangmasuk as $item)
                <x-tr>
                    <x-td class=" border border-black">{{ $loop->iteration }}</x-td>
                    <x-td class=" border border-black">{{ $item->kode }}</x-td>
                    <x-td class=" border border-black">
                        @if ($item->supplier == null)
                            Supplier Hilang
                        @else
                            {{ $item->supplier->supplier }}
                        @endif
                    </x-td>
                    <x-td class=" border border-black">
                        @if ($item->pesanan->jenis == 1)
                            @if ($item->pesanan->bahanbaku == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbaku->nama_bahan_baku }}
                            @endif
                        @elseif($item->pesanan->jenis == 2)
                            @if ($item->pesanan->bahanbakuKemasan == null)
                                Bahan Baku Hilang
                            @else
                                {{ $item->pesanan->bahanbakuKemasan->nama_bahan_baku }}
                            @endif
                        @endif
                    </x-td>
                    <x-td class=" border border-black">{{ $item->pesanan->jumlah }}</x-td>
                    <x-td class=" border border-black">{{ $item->pesanan->transaksi->tgl_transaksi }}</x-td>
                    <x-td class=" border border-black">Rp. {{ number_format($item->pesanan->sub_total, 0, 2) }}</x-td>
                    {{-- <x-td  class=" border border-black">
                    @include('items.td-action', ['id' => $item->id])
                </x-td> --}}
                </x-tr>
            @endforeach
            @php
                $total = 0;
                if ($barangmasuk->count() > 0) {
                    foreach ($barangmasuk as $item) {
                        $b[] = $item->pesanan->sub_total;
                    }
                    $total = array_sum($b);
                }
            @endphp
            <x-tr>
                <x-td class="border border-black" colspan='6'>Total</x-td>
                <x-td class="border border-black">Rp. {{ number_format($total, 0, 2) }}</x-td>
            </x-tr>
        </tbody>
    </x-table>
@endsection
