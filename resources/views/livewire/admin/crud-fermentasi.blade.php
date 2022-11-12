<div>
    @include('sweetalert::alert')
    <div class="w-full md:mb-0">
        <form @if ($itemEdit) action="{{ route('Admin.Fermentasi-edit', ['id' => $item['id']]) }}" @else
            action="{{ route('Admin.Fermentasi-Create') }}" @endif method="POST"
            class="flex md:flex-nowrap flex-wrap justify-center my-2 mx-4 md:mx-0 border-b border-black">
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
                            <x-jet-button type="button" wire:click='hitungJumlah' class="btn btn-primary">hitung</x-jet-button>
                        </div>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Tanggal </label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='date' name='tgl_frementasi' wire:model="tgl_frementasi">
                    </div>
                    <div class="flex items-center justify-between w-full mt-2">
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            <a href="{{ route('Admin.Produk-Fermentasi') }}" class='btn btn-error w-full' type="button">
                                Kembali
                            </a>
                        </div>
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            @if ($gagal == true)
                            <button class='btn btn-primary w-full' type="button" disabled>
                                Kirim
                            </button>
                            @else
                            <button class='btn btn-primary w-full' type="submit">
                                Kirim
                            </button>
                            @endif
                        </div>
                    </div>
                    <div class="divider divider-vertical"></div>
                    <div class="w-full flex">
                        @if (!empty($dataError))
                        <ul class="w-full">
                            @for ($i = 0; $i < count($dataError); $i++) <li class="w-full my-3">
                                <div class="alert alert-error shadow-lg">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span class="font-bold"> Stock : {{$dataError[$i]}} Kurang</span>
                                    </div>
                                </div>
                                </li>
                                @endfor
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    @foreach ($stock as $item => $key)
                    <div class="w-full md:w-full px-3 mb-6 border-b border-black pb-3">
                        <label class="block uppercase tracking-wide text-error text-md font-bold underline mb-2"
                            for='Password'>{{ $key->bahanbaku->nama_bahan_baku }}</label>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>jumlah Stock</label>
                        <div class="flex flex-row items-center   gap-2">
                            <input
                                class=" col-span-1 appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                type='text' value="{{ $key->stock }} / {{ $key->satuan->nama_satuan }}" readonly
                                required>
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
