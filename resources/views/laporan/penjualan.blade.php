@extends('laporan.layout')
@section('title', 'Laporan Barang Masuk')
@section('content')
    <x-table :tambahItem="false">
        <thead>
            <x-tr>
                <x-th class="border border-gray-800">No</x-th>
                <x-th class="border border-gray-800">Nama Pembeli</x-th>
                <x-th class="border border-gray-800">No. Telpon</x-th>
                <x-th class="border border-gray-800">Jenis Produk</x-th>
                <x-th class="border border-gray-800">Tanggal</x-th>
                <x-th class="border border-gray-800">Jumlah</x-th>
                <x-th class="border border-gray-800">Sub Total</x-th>
            </x-tr>
        </thead>
        <tbody>
            @foreach ($penjualan as $item)
                <x-tr>
                    <x-td class="border border-gray-800">{{ $loop->iteration }}</x-td>
                    @if ($item->user == null)
                        <x-td colspan='2'>User Kosong</x-td>
                    @else
                        <x-td class="border border-gray-800">{{ $item->user->name }}</x-td>
                        <x-td class="border border-gray-800">{{ $item->user->no_telpon }}</x-td>
                    @endif
                    <x-td class="border border-gray-800">{{ $item->jenis->nama_jenis }}</x-td>
                    <x-td class="border border-gray-800">{{ $item->transaksi->tgl_transaksi }}</x-td>
                    <x-td class="border border-gray-800">{{ $item->jumlah }}</x-td>
                    <x-td class="border border-gray-800">Rp. {{ number_format($item->sub_total, 0, 2) }}</x-td>

                </x-tr>
            @endforeach
            @php
                $total = 0;
                if ($penjualan->count() > 0) {
                    foreach ($penjualan as $item) {
                        $b[] = $item->sub_total;
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
