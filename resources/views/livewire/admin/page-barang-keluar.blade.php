<div class="animate__animated animate__fadeIn">
    <!-- Add Item Modal -->
    @include('sweetalert::alert')
    <x-jet-dialog-modal wire:model="itemAdd" maxWidth='md'>
        <form>
            @csrf
            <x-slot name="title">
                {{ __('Tambahkan Barang Keluar') }}
                <x-jet-validation-errors />
            </x-slot>

            <x-slot name="content">
                <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                        for='Password'>Jenis</label>
                    <select
                        class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                        wire:model='jenis_id' required wire:change='BuatHarga'>
                        <option value="">----</option>
                        @foreach ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->nama_jenis . '/ Rp'.number_format( $item->harga,0,2)}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Customer') }}" />
                    <select id="supplier"
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                        wire:model='customer'>
                        <option value="--">--Pilih--</option>
                        @foreach ($customer_id as $customerss)
                            <option value="{{ $customerss->customer }}">{{ $customerss->customer }}</option>
                        @endforeach
                        <input type="hidden" name="" wire:model='nama_pelanggan'>
                    </select>
                    <span>Pilih Atau Input Pelanggan</span>
                    <x-jet-input type="text" wire:model='customer' placeholder='Nama Pelanggan'></x-jet-input>
                    @error('customer')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Kode-Barang Keluar') }}" />
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
                    <x-jet-label for="" value="{{ __('Alamat') }}" />
                    <x-jet-input name='alamat' class="block mt-2 w-full" type='text' wire:model='alamat' />
                    @error('alamat')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Tanggal Keluar') }}" />
                    <x-jet-input name='tgl' class="block mt-2 w-full" type='date' wire:model='tgl_keluar' />
                    @error('tgl')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Jumlah Pembelian') }}" />
                    <x-jet-input name='KBM' class="block mt-2 w-full" wire:keyup="getTotal" wire:model='jumlah'
                        type='text' />
                    @error('jumlah')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <x-jet-label for="" value="{{ __('Sub_total') }}" />
                    <x-jet-input name='KBM' wire:model='sub_total' class="block mt-2 w-full" type='text' readonly />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-danger-button wire:click="CloseModal" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-danger-button>
                @if ($itemID ==null)
                    <x-jet-button type="button" wire:click.prevent='create'>
                        {{ __('Tambah Data') }}
                    </x-jet-button>
                @else
                <x-jet-button type="button" wire:click.prevent='edit({{$itemID}})'>
                    {{ __('Tambah Data') }}
                </x-jet-button>
                @endif
            </x-slot>
        </form>
    </x-jet-dialog-modal>

    <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow">
        @if ($itemDelete)
        <x-jet-confirmation-modal>
            <x-slot name="title"></x-slot>
            <x-slot name="content">
                <form>

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                        <div class="">

                            <div class="mb-4">

                                <label for="exampleFormControlInput1"
                                    class="block text-gray-700 text-sm font-bold mb-2">Apakah Anda Yakin Ingin?:</label>
                                <input type="text" wire:model='kode'
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="exampleFormControlInput1" placeholder="Enter Title" wire:model="title">
                                @error('kode')
                                    <span class="text-red-500">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>

                    </div>



                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                            <button wire:click.prevent="delete({{$itemID}})" type="button"
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

                </form>
            </x-slot>
            <x-slot name="footer"></x-slot>
        </x-jet-confirmation-modal>
        @endif
        <div class="w-full overflow-hidden">
            <div class=" w-full overflow-x-auto">
                <div class="w-full overflow-hidden">
                    <div class="w-full overflow-x-auto">
                       @include('sweetalert::alert')
                        <x-table id=""
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50   "
                            style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                            <thead class="w-full whitespace-no-wrap">
                                <x-tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-300">
                                    <x-th class="text-semibold p-2 text-center bg-white">No</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Kode Barang Keluar</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Alamat/Tujuan</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Customer</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Jumlah Pembelian</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Sub Total</x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Transaksi </x-th>
                                    <x-th class="text-semibold p-2 text-center bg-white">Action</x-th>
                                </x-tr>
                            </thead>
                            <tbody>
                                @foreach ($barangkeluar as $item)
                                    <x-tr class="text-gray-700 ">
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $loop->iteration }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center  text-red-500">
                                            {{ $item->kode_barang_keluar }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->alamat_tujuan }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->customer }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">{{ $item->jumlah }}
                                        </x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                           Rp. {{ number_format($item->sub_total,0,2) }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                            {{ $item->tgl_keluar }}</x-td>
                                        <x-td class=" border-2 border-gray-200 text-xs text-center ">
                                         @include('items.td-action', ['id'=> $item->id])
                                        </x-td>
                                    </x-tr>
                                @endforeach
                            </tbody>

                        </x-table>
                    </div>
                </div>

            </div>
        </div>
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    {{ $barangkeluar->links() }}
                </ul>
            </nav>
        </span>

    </div>
</div>
