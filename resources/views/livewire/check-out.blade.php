<div>

    <main class=" md:flex mt-5 z-0">
        <div class="px-4 py-6 sm:px-6 lg:hidden">
            <div class="max-w-lg mx-auto flex">
                <a href="#">
                    <span class="sr-only">Workflow</span>
                    <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&shade=600" alt=""
                        class="h-8 w-auto">
                </a>
            </div>
        </div>

        <!-- Order summary -->
        <section aria-labelledby="summary-heading" class="hidden bg-gray-50 w-full max-w-md flex-col lg:flex">
            <h2 id="summary-heading" class="sr-only">Order summary</h2>

            <ul role="list" class="flex-auto overflow-y-auto divide-y divide-gray-200 px-6">
                <li class="flex py-2 space-x-2">
                    <img src="{{asset('img/landing/landing (1).jpeg')}}"
                        alt="Moss green canvas compact backpack with double top zipper, zipper front pouch, and matching carry handle and backpack straps."
                        class="flex-none w-96 max-h-52 object-center object-cover bg-gray-200 rounded-md">

                </li>

                <!-- More products... -->
            </ul>
            <form class="mt-6" action="{{route('Customer.Simpan-Pesanan', ['id'=> \Hash::make('123456')])}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="data">
                <div class="sticky bottom-0 flex-none bg-gray-50 border-t border-gray-200 p-6">
                    {{-- <form>
                        <label for="discount-code" class="block text-sm font-medium text-gray-700">Discount code</label>
                        <div class="flex space-x-4 mt-1">
                            <input type="text" id="discount-code" name="discount-code"
                                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <button type="submit"
                                class="bg-gray-200 text-sm font-medium text-gray-600 rounded-md px-4 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Apply</button>
                        </div>
                    </form> --}}

                    <dl class="text-sm font-medium text-gray-500 mt-10 space-y-6">

                        <div class="flex justify-between">
                            <dt>Stock Barang</dt>
                            <dd class="text-gray-900">{{$jenis->id}}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Harga</dt>
                            <dd class="text-gray-900">Rp. {{number_format($jenis->harga,0,2)}}</dd>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                            <dt class="text-base">Total</dt>
                            <dd class="text-base">Rp. {{number_format($sub_total,0,2)}}</dd>
                            <input type="hidden" name="sub_total" value="{{$sub_total}}">
                        </div>
                    </dl>
                </div>
        </section>

        <!-- Checkout form -->
        <section aria-labelledby="payment-heading"
            class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
            <div class=" mx-auto">
                <div class="">
                    <div class="input-group input-group-vertical my-2">
                        <x-jet-label for="" class="font-semibold text-lg">Jenis Pembayaran</x-jet-label>
                        @foreach ($bank as $bank)
                        <div tabindex="{{$bank->id}}"
                            class="collapse collapse-arrow border border-base-300 bg-base-100 rounded-box h-max">
                            <div class="collapse-title text-base font-medium">
                                <input type="checkbox" checked="checked" class="checkbox checkbox-secondary" name="metode" value="{{$bank->metode}}"/>
                                {{$bank->metode}}
                            </div>
                            <div class="collapse-content">
                                <p>Nama : {{$bank->name_card}}</p>
                                <p>No. Rek :{{$bank->number_rek}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <x-jet-validation-errors />
                <label class="input-group input-group-vertical my-2">
                    <x-jet-label for="" class="font-semibold text-lg">Bukti Transaksi</x-jet-label>
                    <x-jet-input type="file" name="bukti" class="input input-bordered" />
                </label>
                <label class="input-group input-group-vertical my-2">
                    <x-jet-label for="" class="font-semibold text-lg">Jumlah</x-jet-label>
                    <x-jet-input type="text" name="jumlah" wire:change='hitungTotal' wire:model.defer='jumlah_barang'
                        placeholder="Masukkan Jumlah" class="input input-bordered" />
                </label>
                <label class="input-group input-group-vertical my-2">
                    <x-jet-label for="" class="font-semibold text-lg">Tanggal Transaksi</x-jet-label>
                    <x-jet-input type="date" name="tgl" placeholder="Masukkan tgl" class="input input-bordered" />
                </label>

                <button type="submit" class="btn btn-warning w-full">Bayar</button>

                <p class="flex justify-center text-sm font-medium text-gray-500 mt-6">
                    <!-- Heroicon name: solid/lock-closed -->
                    <svg class="w-5 h-5 text-gray-400 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" fill="currentColor">
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
    </main>

</div>
