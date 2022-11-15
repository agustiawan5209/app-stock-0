@extends('laporan.layout')
@section('title', 'Laporan Barang Keluar')
@section('content')
    <x-table :tambahItem="false">
        <thead class="w-full whitespace-no-wrap">
            <x-tr class="">
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">No</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Kode Barang Keluar
                </x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Alamat/Tujuan</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Customer</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Jenis</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Jumlah Pembelian</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Sub Total</x-th>
                <x-th class="text-semibold p-0 text-center bg-white text-xs whitespace-nowrap border border-gray-800">Transaksi </x-th>
            </x-tr>
        </thead>
        <tbody>
            @foreach ($barangkeluar as $item)
                <x-tr class="text-gray-700 ">
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        {{ $loop->iteration }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap  text-red-500">
                        {{ $item->kode_barang_keluar }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        {{ $item->alamat_tujuan }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        {{ $item->customer }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        {{ $item->jenis->nama_jenis }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">{{ $item->jumlah }}
                    </x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        Rp. {{ number_format($item->sub_total, 0, 2) }}</x-td>
                    <x-td class=" border-2 border-gray-200 text-xs text-center whitespace-nowrap ">
                        {{ $item->tgl_keluar }}</x-td>

                </x-tr>
            @endforeach
            @php
                $total = 0;
                if ($barangkeluar->count() > 0) {
                    foreach ($barangkeluar as $item) {
                        $b[] = $item->sub_total;
                    }
                    $total = array_sum($b);
                }
            @endphp
            <x-tr>
                <x-td class="border border-black" colspan='7'>Total</x-td>
                <x-td class="border border-black">Rp. {{ number_format($total, 0, 2) }}</x-td>
            </x-tr>
        </tbody>
    </x-table>
@endsection
