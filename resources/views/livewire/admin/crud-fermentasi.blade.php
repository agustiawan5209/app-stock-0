<div>
    <div class="w-full md:mb-0">
        <form action="{{ route('Admin.Fermentasi-Create') }}" method="POST" class="flex md:flex-nowrap flex-wrap justify-center my-2 mx-4 md:mx-0">
            <div class="w-full max-w-xl bg-white rounded-lg shadow-md p-6">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Kode</label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' name='kode' wire:model="kode" readonly required>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='jumlah'>Jumlah Stock</label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='text' name='jumlah_stock' required>
                    </div>
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                            for='Password'>Tanggal fermentasi</label>
                        <input
                            class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                            type='date' name='tgl_frementasi' required>
                    </div>
                    <div class="flex items-center w-full mt-2">
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            <button
                                class='appearance-none flex items-center justify-center w-full bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none'
                                type="button">
                                Tutup
                            </button>
                        </div>
                        <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                            <button
                            class='appearance-none flex items-center justify-center w-full bg-blue-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-600 hover:text-white focus:outline-none'
                            type="submit">
                            Kirim
                        </button>
                        </div>
                    </div>
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

                            <input
                                class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none"
                                type='text'
                                value="{{ $key->stock }} / {{ $key->satuan->nama_satuan }}" readonly required>

                                <input type="hidden" name="id[]" value="{{$key['id'] }}" />
                                <input type="hidden" name="stock[]" value="{{$key['stock'] }}" />
                                <input type="hidden" name="max[]" value="{{$key['max'] }}" />
                        </div>
                    @endforeach
                </div>
            </div>
        </form>
    </div>
</div>
