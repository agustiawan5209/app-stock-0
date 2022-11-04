<div>
    <x-table  :tambahItem="false">
        <x-tr>
            <x-th>No</x-th>
            <x-th>Nama Pembeli</x-th>
            <x-th>No. Telpon</x-th>
            <x-th>Jenis Produk</x-th>
            <x-th>Jumlah</x-th>
            <x-th>Sub Total</x-th>
            <x-th>Status</x-th>
            <x-th>Aksi</x-th>
        </x-tr>
        @foreach ($pesan as $item)
            <x-tr>
                <x-td>{{ $loop->iteration }}</x-td>
                @if ($item->user == null)
                    <x-td colspan='2'>User Kosong</x-td>
                @else
                    <x-td>{{ $item->user->name }}</x-td>
                    <x-td>{{ $item->user->no_telpon }}</x-td>
                @endif
                <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                <x-td>{{ $item->jumlah }}</x-td>
                <x-td>{{ number_format($item->sub_total, 0, 2) }}</x-td>
                <x-td>
                    @php
                        switch ($item->status) {
                            case '1':
                                $msg = '<div class="alert alert-warning shadow-lg text-xs">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                  <span>Belum Konfirmasi!</span>
                </div>
              </div>';
                                break;
                            case '2':
                                $msg = '<div class="alert alert-success shadow-lg text-xs">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Telah Di konfirmasi!</span>
                </div>
              </div>';
                                break;
                            case '3':
                                $msg = '<div class="alert alert-info shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <span>Dalam Pengiriman.</span>
                </div>
              </div>';
                                break;
                            case '4':
                                $msg = '<div class="alert alert-success shadow-lg text-xs">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Telah Di Terima!</span>
                </div>
              </div>';
                                break;
                            case '5':
                                $msg = '<div class="alert alert-success shadow-lg text-xs">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-5 w-5" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                  <span>Telah Diterima!</span>
                </div>
              </div>';
                                break;

                            default:
                                $msg = 'Kosong';
                                break;
                        }

                    @endphp
                    {!! $msg !!}
                </x-td>
                <x-td>
                    <div class="flex space-x-1 justify-around">
                        <a href="#" wire:click="editModal({{ $item->id }})"
                            class="p-1 text-white bg-success  rounded">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                </path>
                            </svg>
                        </a>

                        <button wire:click='deleteModal({{ $item->id }})' class="p-1 text-white  bg-error  rounded">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                </x-td>
            </x-tr>
        @endforeach
    </x-table>
</div>
