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
                    <button wire:click='detailModal({{ $barangmasuks->id }})'
                    class="p-1 text-white  bg-info  rounded">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </button>

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
