<div>
    <x-table class="table">
        <thead>
            <x-tr>
                <x-th>No.</x-th>
                <x-th>ID Pesanan</x-th>
                <x-th>Bahan Baku</x-th>
                <x-th>Bank</x-th>
                <x-th>Jumlah Pesanan</x-th>
                <x-th>Sub Total</x-th>
                <x-th>Status</x-th>
                <x-th>Aksi</x-th>
            </x-tr>
        </thead>
        <tbody>
            <x-tr>
               @foreach ($barang as $barangmasuks)
                 <x-td>{{$loop->iteration}}</x-td>
                 <x-td>{{$barangmasuks->pesanan->transaksi->ID_transaksi}}</x-td>
                 <x-td>{{$barangmasuks->pesanan->bahanbaku->nama_bahan_baku}}</x-td>
                 <x-td>{{$barangmasuks->pesanan->transaksi->metode}}</x-td>
                 <x-td>{{$barangmasuks->pesanan->jumlah}}</x-td>
                 <x-td>Rp. {{number_format($barangmasuks->pesanan->sub_total, 0,2)}}</x-td>
                 <x-td>
                    <button type="button" class="btn btn-accent" wire:click='statusPesanan({{$barangmasuks->pesanan->id}})'>Belum Konfirmasi</button>
                 </x-td>
                 <x-td>
                    @include('items.td-action', ['id'=> $barangmasuks->id])
                 </x-td>
               @endforeach
            </x-tr>
        </tbody>

    </x-table>
    <x-jet-dialog-modal wire:model="itemStatus">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
           <x-statuspage :id="$itemID" />
        </x-slot>
        <x-slot name="footer"></x-slot>
    </x-jet-dialog-modal>
</div>
