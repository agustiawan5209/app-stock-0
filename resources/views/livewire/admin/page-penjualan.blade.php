<div>

    <x-jet-dialog-modal wire:model="itemStatus">
        <x-slot name="title"></x-slot>
        <x-slot name="content">
            <x-statuspage :id="$itemID" :jenis="2" />
            @if ($statusItem == 1 || $statusItem == 2 || $statusItem == 3)
                <form action="" class="w-full">
                    <label class="input-group input-group-vertical my-2">
                        <span class="bg-neutral font-semibold text-lg">Update Status</span>
                        <select wire:model='status' name="bukti" class="input input-bordered">
                            <option value="">---</option>
                            @if ($statusItem == 1)
                                <option value="2" selected>Konfirmasi</option>
                            @endif
                            @if ($statusItem == 2)
                                <option value="3" selected>Pengiriman Barang</option>
                            @endif
                            @if ($statusItem == 3)
                                <option value="4" selected>Barang Diterima</option>
                            @endif
                        </select>
                    </label>
                    <label class="input-group input-group-vertical my-2">
                        <span class="bg-neutral font-semibold text-lg">Keterangan</span>
                        <textarea class="textarea textarea-bordered h-40" wire:model="ket" id="ket" cols="10" rows="10"></textarea>
                    </label>

                    {{-- Page Penjualan Form Input Barang Keluar --}}
                    @if ($statusItem == 2)
                        <div class="w-full md:w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for='Password'>Jenis</label>
                            <x-jet-input type="text" wire:model='nama_jenis' placeholder='Nama Pelanggan'>
                            </x-jet-input>

                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Customer') }}" />
                            <x-jet-input type="text" wire:model='customer' placeholder='Nama Pelanggan'>
                            </x-jet-input>
                            @error('customer')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Kode-Barang Keluar') }}" />
                            <div class="flex flex-row justify-start items-center">
                                <div>
                                    <x-jet-input name='kode' class="block mt-2 w-full" type='text'
                                        wire:model='kode' readonly />
                                    @error('kode')
                                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Alamat') }}" />
                            <x-jet-input name='alamat' class="block mt-2 w-full" type='text' wire:model='alamat' />
                            @error('alamat')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Tanggal Keluar') }}" />
                            <x-jet-input name='tgl' class="block mt-2 w-full" type='date'
                                wire:model='tgl_keluar' />
                            @error('tgl')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Jumlah Pembelian') }}" />
                            <x-jet-input name='KBM' class="block mt-2 w-full" wire:model='jumlah' type='text' />
                            @error('jumlah')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <x-jet-label for="" value="{{ __('Sub_total') }}" />
                            <x-jet-input name='KBM' wire:model='sub_total' class="block mt-2 w-full" type='text'
                                readonly />
                        </div>
                    @endif
                    {{-- End --}}
                </form>
            @endif
        </x-slot>
        <x-slot name="footer">
            @if ($statusItem == 1 || $statusItem == 2 || $statusItem == 3)
                <button type="button" class="btn btn-nebg-neutral"
                    wire:click="updateStatus({{ $itemID }})">Simpan</button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>
    @if ($itemDetail)
        <x-jet-dialog-modal wire:model="itemDetail" maxWidth="3xl">
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <div class="flex flex-col md:flex-row gap-2">
                    <div class="overflow-auto ">
                        <table class="table">
                            <tbody>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Metode Bayar</x-th>
                                    <x-td>Bank {{ $detail->transaksi->metode }}</x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">ID Pesanan</x-th>
                                    <x-td>{{ $detail->transaksi->ID_transaksi }}</x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Kode Barang Masuk</x-th>
                                    <x-td>{{ $detail->kode }}</x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Bahan Baku</x-th>
                                    <x-td>
                                        @if ($detail->jenis == null)
                                            Jenis Hilang
                                        @else
                                            {{ $detail->jenis->nama_jenis }}
                                        @endif
                                    </x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Tanggal Transaksi</x-th>
                                    <x-td>{{ $detail->transaksi->tgl_transaksi }}</x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Jumlah Pembelian</x-th>
                                    <x-td>{{ $detail->jumlah }}</x-td>
                                </x-tr>
                                <x-tr>
                                    <x-th class="bg-secondary text-xs px-1 py-1 ">Total Pembelian</x-th>
                                    <x-td>Rp. {{ number_format($detail->sub_total, 0, 2) }}</x-td>
                                </x-tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card w-96 glass">
                        <figure><img src="{{ asset('upload/bukti/' . $detail->transaksi->bukti_transaksi) }}"
                                alt="car!" /></figure>
                        <div class="card-body">
                            <h2 class="card-title bg-info-content px-2 py-2 text-center">Bukti Bayar</h2>
                            <div class="card-action">
                                <a href="{{ url()->previous() }}" class="btn btn-error">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer"></x-slot>
        </x-jet-dialog-modal>
    @endif
    <div class="w-full">
        <x-table :tambahItem="false">
            <thead>
                <x-tr>
                    <x-th>No</x-th>
                    <x-th>Nama Pembeli</x-th>
                    <x-th>No. Telpon</x-th>
                    <x-th>Jenis Produk</x-th>
                    <x-th>Tanggal Transasi</x-th>
                    <x-th>Jumlah</x-th>
                    <x-th>Sub Total</x-th>
                    <x-th>Status</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @foreach ($pesan as $item)
                    <x-tr>
                        <x-td>{{ $loop->iteration }}</x-td>
                        @if ($item->user == null)
                            <x-td colspan='2'>User Kosong</x-td>
                        @else
                            <x-td>{{ $item->user->name }}</x-td>
                            <x-td>{{ $item->user->no_telpon }}</x-td>
                        @endif
                        @if ($item->jenis !== null)
                        <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                    @else
                        <x-td>{{ $item->nama_jenis }}</x-td>
                    @endif
                        <x-td>{{ $item->transaksi->tgl_transaksi }}</x-td>
                        <x-td>{{ $item->jumlah }}</x-td>
                        <x-td>{{ number_format($item->sub_total, 0, 2) }}</x-td>
                        <x-td>
                            <button type="button" class="btn btn-accent"
                                wire:click='statusPesanan({{ $item->id }})'>{{ $item->statusJenis($item->status) }}</button>
                        </x-td>
                        <x-td>
                            <div class="flex space-x-1 justify-around">
                                <a href="#" wire:click="detailModal({{ $item->id }})"
                                    class="p-1 text-white bg-info  rounded-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>

                                </a>

                            </div>

                        </x-td>
                    </x-tr>
                @endforeach
            </tbody>
        </x-table>
    </div>
</div>
