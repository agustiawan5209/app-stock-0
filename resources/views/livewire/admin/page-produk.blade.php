<main>
    @include('sweetalert::alert')
    <!-- component -->
    <section>
        <x-table>
            <thead>
                <x-tr>
                    <x-th>NO</x-th>
                    <x-th>Kode</x-th>
                    <x-th>jumlah</x-th>
                    <x-th>Tanggal Kadaluarsa</x-th>
                    <x-th>Jenis</x-th>
                    <x-th></x-th>
                </x-tr>
            </thead>
            <tbody>
                @if ($produk->count() > 0)
                    @foreach ($produk as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->kode }}</x-td>
                            <x-td>{{ $item->jumlah }}</x-td>
                            <x-td>{{ $item->tgl_kadaluarsa }}</x-td>
                            <x-td>{{ $item->jenis->nama_jenis }}</x-td>
                            <x-td class="flex justify-center items-center px-2 py-0">
                                <x-button type='button' wire:click='deleteModal({{ $item->id }})'
                                    class="bg-red-500 text-white">Delete</x-button>

                                <x-button type='button' wire:click='editModal({{ $item->id }})'
                                    class="bg-green-500 text-white">Edit</x-button>
                            </x-td>
                        </x-tr>
                    @endforeach
                @else
                    <x-tr>
                        <x-td colspan="3">Data Kosong</x-td>
                    </x-tr>
                @endif
            </tbody>
        </x-table>
    </section>
    <div>

        <x-jet-confirmation-modal wire:model='itemDelete'>
            <x-slot name="title">
                Delete Jenis
            </x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <x-jet-button type="button" wire:click="closeModal">Tutup</x-jet-button>
                <x-jet-danger-button type="button" wire:click="delete({{ $itemID }})">Hapus</x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
        @if ($itemEdit)
            <x-jet-dialog-modal wire:model='itemEdit'>
                <x-slot name="title">
                    Edit Jenis
                </x-slot>
                <x-slot name="content">
                    <div class="flex justify-center my-2 mx-4 md:mx-0">
                        <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Kode</label>
                                        <select
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        wire:model='kode' required>
                                        <option value="">----</option>
                                        @foreach ($fermentasi as $item)
                                                <option value="{{$item->id}}">{{$item->kode  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>jumlah</label>
                                    <input
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        type='text' wire:model='jumlah' required>
                                </div>
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Tanggal kadaluarsa</label>
                                    <input
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        type='date' wire:model='tgl_kadaluarsa' required>
                                </div>
                                <div class="w-full md:w-full px-3 mb-6">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for='Password'>Jenis</label>
                                    <select
                                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                        wire:model='jenis_id' required>
                                        <option value="">----</option>
                                        @foreach ($jenis as $item)
                                                <option value="{{$item->id}}">{{$item->nama_jenis . '/ Rp'.number_format( $item->harga,0,2) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center w-full mt-2">
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                            type="button" wire:click="closeModal">
                                            Tutup
                                        </button>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                        <button
                                            class="appearance-none flex items-center justify-center w-full bg-blue-100 text-blue-700 shadow border border-blue-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-200 hover:text-blue-700 focus:outline-none"
                                            type="button" wire:click="edit({{ $itemID }})">
                                            Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </x-slot>
                <x-slot name="footer">
                </x-slot>
            </x-jet-dialog-modal>
        @endif
        @if ($itemAdd)
        <x-jet-dialog-modal wire:model='itemAdd'>
            <x-slot name="title">
                Tambah Jenis
            </x-slot>
            <x-slot name="content">
                <div class="flex justify-center my-2 mx-4 md:mx-0">
                    <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for='Password'>Kode</label>
                                    <input
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    type='text' wire:model='kode' readonly required>
                            </div>
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for='Password'>Kode Fermentasi</label>
                                    <select
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    wire:model='kode_fermentasi' wire:change='getJumlah()' required>
                                    <option value="">----</option>
                                    @foreach ($fermentasi as $item)
                                            <option value="{{$item->id}}">{{$item->kode  }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for='Password'>jumlah</label>
                                <input
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    type='text' wire:model='jumlah' readonly required>
                            </div>
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for='Password'>Tanggal kadaluarsa</label>
                                <input
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    type='date' wire:model='tgl_kadaluarsa' required>
                            </div>
                            <div class="w-full md:w-full px-3 mb-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for='Password'>Jenis</label>
                                <select
                                    class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    wire:model='jenis_id' required>
                                    <option value="">----</option>
                                    @foreach ($jenis as $item)
                                            <option value="{{$item->id}}">{{$item->nama_jenis . '/ Rp'.number_format( $item->harga,0,2)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center w-full mt-2">
                                <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                    <button
                                        class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                        type="button" wire:click="closeModal">
                                        Tutup
                                    </button>
                                </div>
                                <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                                    <button
                                        class="appearance-none flex items-center justify-center w-full bg-blue-100 text-blue-700 shadow border border-blue-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-200 hover:text-blue-700 focus:outline-none"
                                        type="button" wire:click="create">
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </x-slot>
            <x-slot name="footer">
            </x-slot>
        </x-jet-dialog-modal>
    @endif
    </div>

</main>
