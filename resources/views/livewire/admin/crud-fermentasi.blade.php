<div>
    <div class="w-full md:mb-0">
        <form
            @if ($itemEdit) action="{{ route('Admin.Fermentasi-edit', ['id' => $item['id']]) }}" @else action="{{ route('Admin.Fermentasi-Create') }}" @endif
            method="POST" class="flex md:flex-nowrap flex-wrap justify-center my-2 mx-4 md:mx-0">
            @if ($itemEdit)
                @method('PUT')
            @else
                @method('POST')
            @endif
            <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <x-jet-validation-errors />

                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Kode</label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' name='kode' wire:model="kode" readonly>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='jumlah'>Jumlah</label>
                        <div class="flex items-center">
                            <input
                                class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                type='text' name='jumlah_stock' wire:model.defer="jumlah_stock">
                            <x-jet-button type="button" wire:click='hitungJumlah'>hitung</x-jet-button>
                        </div>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Tanggal fermentasi</label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='date' name='tgl_frementasi' wire:model="tgl_frementasi">
                    </div>
                    <div class="flex items-center w-full mt-2">
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            <a href="{{ route('Admin.Produk-Fermentasi') }}"
                                class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                type="button">
                                Kembali
                            </a>
                        </div>
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            <button
                                class='appearance-none flex items-center justify-center w-full bg-blue-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-600 hover:text-white focus:outline-none'
                                type="submit">
                                Kirim
                            </button>
                        </div>
                    </div>
                    @if ($loadingState)
                        <ul>
                            @for ($i = 0; $i < count($data); $i++)
                                <li>{{ $data[$i] }}</li>
                            @endfor
                        </ul>
                    @endif
                </div>
            </div>
            <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    @foreach ($stock as $item => $key)
                        <div class="w-full md:w-full px-3 mb-6 border-b border-black pb-3">
                            <label class="block uppercase tracking-wide text-red-500 text-md font-bold underline mb-2"
                                for='Password'>{{ $key->bahanbaku->nama_bahan_baku }}</label>
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for='Password'>jumlah Stock</label>
                            <div class="flex flex-row items-center   gap-2">
                                <input
                                    class=" col-span-1 appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                    type='text' value="{{ $key->stock }} / {{ $key->satuan->nama_satuan }}"
                                    readonly required>
                                @if ($loadingState)
                                            <div class="text-lg">{{ $data[$item] }}</div>
                                @endif
                            </div>

                            <input type="hidden" name="id[]" value="{{ $key['id'] }}" />
                            <input type="hidden" name="stock[]" value="{{ $key['stock'] }}" />
                            <input type="hidden" name="max[]" value="{{ $key['max'] }}" />
                        </div>
                    @endforeach
                </div>

            </div>
        </form>
    </div>
</div>
