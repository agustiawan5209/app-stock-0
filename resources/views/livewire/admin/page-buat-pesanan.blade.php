<div>
    <div class="mx-auto container px-6 xl:px-0 py-12">
        <div class="flex flex-col">
            @include('sweetalert::alert')
            <x-table :tambahItem="false">
                <thead>
                    <x-tr>
                        <x-th>Supplier</x-th>
                        <x-th>Detail Bahan Baku</x-th>
                    </x-tr>

                </thead>
                <tbody>
                    @foreach ($supplier as $supplier)
                    @if ($supplier->bahan_baku_kemasan->count() > 0 || $supplier->bahan_bakus->count() > 0)
                            <x-tr>
                                <x-td>{{ $supplier->supplier }}</x-td>
                                <td>
                                    <table class="w-full">
                                        <tr>
                                            <x-th>Nama Bahan Baku</x-th>
                                            <x-th>Harga</x-th>
                                            <x-th>Satuan</x-th>
                                            <x-th>Jumlah Stock</x-th>
                                            <x-th></x-th>
                                        </tr>
                                        @foreach ($supplier->bahan_baku_kemasan as $item)
                                            <tr>
                                                <x-td>
                                                    @if ($item->jenis == 1)
                                                        {{ $item->bahanbaku->nama_bahan_baku }}
                                                    @elseif($item->jenis == 2)
                                                        {{ $item->bahanbakuKemasan->nama_bahan_baku }}
                                                    @endif
                                                </x-td>
                                                <td>{{ $item->harga }}</td>
                                                <td>{{ $item->satuan }}</td>
                                                <td>{{ $item->jumlah_stock }}</td>
                                                <x-td>
                                                    <button type="button" wire:click='addModal({{$item->id}})' class="btn">Pesan</button>
                                                </x-td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </x-tr>
                            @endif
                            @endforeach
                </tbody>
            </x-table>
        </div>
        <x-jet-dialog-modal wire:model='itemAdd'>
            <x-slot name="title">Form Buat Pesanan</x-slot>
            <x-slot name="content">
                <table class="table justify-center">
                    <tr class=" bg-base-100 w-56">
                        <th>Bahan Baku
                        </th>
                        <th>Satuan
                        </th>
                        <th>isi
                        </th>
                        <th>harga
                        </th>
                        <th>Jumlah Stock
                        </th>
                        <th>supplier
                        </th>
                    </tr>
                    <tr>
                        <td class="border-x text-center">{{ $bahan_baku }}</td>
                        <td class="border-x text-center">{{ $satuan }}</td>
                        <td class="border-x text-center">{{ $isi }}</td>
                        <td class="border-x text-center">{{ $harga }}</td>
                        <td class="border-x text-center">{{ $jumlah_stock }}</td>
                        <td class="border-x text-center">{{ $supplier_id }}</td>

                    </tr>
                </table>
            </x-slot>
            <x-slot name="footer">
                <button type="button" class="btn btn-error" wire:click="CloseModal">Batalkan</button>
                <button type="button" class="btn btn-primary" wire:click="kirimCekout({{ $itemID }})">Buat
                    Pesanan</button>
            </x-slot>
        </x-jet-dialog-modal>

    </div>
    {{-- Detail Produk --}}
    {{--
    <x-bahan-baku-detail :id="1" /> --}}
</div>
