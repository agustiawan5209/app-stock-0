<div>
    @include('sweetalert::alert');
    <section>
        <div class=" w-full sm:max-w-md md:max-w-7xl border mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($data_produksi as $item)
                    <div class="col-span-1 border px-4 py-2 flex flex-col bg-white rounded-lg">
                        <div class=" flex flex-row justify-start items-center">
                            <dl class=" text-sm md:text-base font-medium tracking-wide">Jenis Botol : </dl>
                            <dt class=" text-sm md:text-base">{{ $item->jenis }}</dt>
                        </div>
                        <div class=" flex flex-row justify-start">
                            <dl class="text-base md:text-xl font-medium tracking-wide">Jumlah Produksi :</dl>
                            <dt class="text-base md:text-xl font-medium tracking-wide">{{ $item->jumlah_produksi }}</dt>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <x-table :tambahItem="true">
            <thead>
                <x-tr>
                    <x-th>NO</x-th>
                    <x-th>Kode</x-th>
                    <x-th>Jenis Produksi</x-th>
                    <x-th>jumlah</x-th>
                    <x-th>Tanggal Pengemasan</x-th>
                    <x-th>Aksi</x-th>
                </x-tr>
            </thead>
            <tbody>
                @if ($pengemasan->count() > 0)
                    @foreach ($pengemasan as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->kode }}</x-td>
                           @if ($item->produksi !== null)
                           <x-td>{{ $item->produksi->nama_jenis }}</x-td>
                           @else
                           <x-td>Jenis Kosong</x-td>
                           @endif
                            <x-td>{{ $item->jumlah }} Botol</x-td>
                            <x-td>{{ $item->tgl_pengemasan }}</x-td>
                            <x-td>
                                <div class="flex space-x-1 justify-around">
                                    <button wire:click='deleteModal({{ $item->id }})'
                                        class="p-1 text-white  bg-error  rounded">
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
                @endif
            </tbody>
        </x-table>

        <x-jet-dialog-modal wire:model="itemCreate" maxWidth='md'>
            <form>
                @csrf
                <x-slot name="title">
                    {{ __('Form Pengemasan Barang') }}
                    <x-jet-validation-errors />
                </x-slot>

                <x-slot name="content">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Jenis</label>
                        <select
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            wire:model='jenis_produk' required >
                            <option value="">----</option>
                            @foreach ($jenis as $item)
                            <option value="{{$item->id}}">{{$item->nama_jenis . '/ Rp'.number_format(
                                $item->harga,0,2)}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('Kode-Pengemasan Barang') }}" />
                        <div class="flex flex-row justify-start items-center">
                            <div>
                                <x-jet-input name='kode' class="block mt-2 w-full" type='text' wire:model='kode'
                                    readonly />
                                @error('kode')
                                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                                @enderror
                            </div>
                            <x-jet-button type='button' class="block h-8" wire:click='generateKode'>
                                Buat Kode
                            </x-jet-button>
                        </div>
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('tgl pengemasan') }}" />
                        <x-jet-input name='tgl_pengemasan' class="block mt-2 w-full" type='date' wire:model='tgl_pengemasan' />
                        @error('tgl_pengemasan')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-jet-label for="" value="{{ __('jumlah') }}" />
                        <x-jet-input name='jumlah' class="block mt-2 w-full" type='number' wire:model='jumlah' />
                        @error('jumlah')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                        @enderror
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-jet-danger-button wire:click="closeModal" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-danger-button>
                    @if ($itemEdit == false)
                    <x-jet-button type="button" wire:click.prevent='create'>
                        {{ __('Tambah Data') }}
                    </x-jet-button>
                    @else
                    <x-jet-button type="button" wire:click.prevent='edit({{$itemID}})'>
                        {{ __('Edit Data') }}
                    </x-jet-button>
                    @endif
                </x-slot>
            </form>
        </x-jet-dialog-modal>
        <x-jet-confirmation-modal wire:model="itemDelete">
            <x-slot name="title">
                <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Apakah Anda
                    Yakin Ingin?:</label>
            </x-slot>
            <x-slot name="content">
            </x-slot>
            <x-slot name="footer">
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                        <button wire:click.prevent="delete" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Hapus

                        </button>

                    </span>

                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                        <button wire:click="closeModal()" type="button"
                            class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                            Cancel

                        </button>

                    </span>
                </div>
            </x-slot>
        </x-jet-confirmation-modal>
    </section>
</div>
