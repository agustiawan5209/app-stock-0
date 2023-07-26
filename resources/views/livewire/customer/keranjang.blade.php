<div>
    @include('sweetalert::alert')
    <div class="w-full !bg-white px-2 md:px-10  flex justify-center container overflow-x-auto mx-auto">
        <div class="container my-10 bg-white">
            <table class=" table table-normal w-full bg-white">
                <thead>
                    <x-tr>
                        <x-th>No.</x-th>
                        <x-th>Jenis</x-th>
                        <x-th>Harga Produk</x-th>
                        <x-th>Stok Produk</x-th>
                        <x-th>hapus</x-th>
                    </x-tr>
                </thead>
                <tbody class="bg-white">
                    @foreach ($cart as $item)
                        <x-tr>
                            <x-td>{{ $loop->iteration }}</x-td>
                            <x-td>{{ $item->nama }}</x-td>
                            <x-td>Rp. {{ number_format($item->harga, 0, 2) }}</x-td>
                            <x-td>{{ $item->jumlah }}</x-td>

                            <x-td>
                                <button wire:click='hapus({{ $item->id }})' class="p-1 text-white  bg-info  rounded">
                                    Hapus
                                </button>
                            </x-td>
                        </x-tr>
                    @endforeach
                </tbody>
            </table>
            <div class="container grid grid-cols-12 md:pr-10">
                <div class="col-span-9">
                    <!-- Checkout form -->
                    <section aria-labelledby="payment-heading"
                        class="bg-white flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
                        <form action="{{ route('Customer.keranjang.post') }}" method="post" enctype="multipart/form-data"  class=" mx-auto">
                            @csrf
                            <div class="">
                                <div class="input-group input-group-vertical my-2">
                                    <x-jet-label for="" class="font-semibold text-base">Jenis Pembayaran
                                    </x-jet-label>
                                    @foreach ($bank as $bank)
                                        <div tabindex="{{ $bank->id }}"
                                            class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box h-max">
                                            <div class="collapse-title text-base font-medium">
                                                <input type="radio" checked="checked"
                                                    class="checkbox checkbox-secondary" name="metode"
                                                    value="{{ $bank->metode }}" />
                                                {{ $bank->metode }}
                                            </div>
                                            <div class="collapse-content">
                                                <p>Nama : {{ $bank->name_card }}</p>
                                                <p>No. Rek :{{ $bank->number_rek }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <x-jet-validation-errors />
                            <label class="input-group input-group-vertical my-2">
                                <x-jet-label for="" class="font-semibold text-base">Bukti Transaksi</x-jet-label>
                                <input type="file" name="bukti" class="input input-bordered" />
                            </label>
                            <label class="input-group input-group-vertical my-2">
                                <x-jet-label for="" class="font-semibold text-base">Tanggal Transaksi
                                </x-jet-label>
                                <x-jet-input type="date" name="tgl" placeholder="Masukkan tgl"
                                    class="input input-bordered" />
                            </label>
                            <label class="input-group input-group-vertical my-2">
                                <x-jet-label for="" class="font-semibold text-base">Keterangan</x-jet-label>
                                <textarea name="ket" rows="5" cols="10"></textarea>
                            </label>

                            <button type="submit" class="btn btn-warning w-full">Bayar</button>

                            <p class="flex justify-center text-sm font-medium text-gray-500 mt-6">
                                <!-- Heroicon name: solid/lock-closed -->
                                <svg class="w-5 h-5 text-gray-400 mr-1.5" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                Isi Detail Transaksi
                            </p>
                            </form>
                        </div>
                    </section>
                    {{-- Output Bank --}}
                </div>
                <div class="col-span-3">
                    <ul class="inline-flex w-full space-x-4">
                        <li>Sub Total</li>
                        <li>:</li>
                        <li> Rp.{{ number_format($total, 0, 2) }} </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
