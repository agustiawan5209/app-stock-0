<div class="container">
    <div class="mt-10 sm:mt-0">
        <h4 class="mb-4 text-lg font-semibold text-gray-600   ">
            {{ __('Metode Pembayaran') }}
        </h4>
        @include('sweetalert::alert')
        @if ($itemEdit)
            <x-jet-dialog-modal wire:model="itemEdit">
                    <x-jet-validation-errors/>
                    <x-slot name="title"></x-slot>
                <x-slot name="content">
                    <form>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                            <div class="">

                                <div class="mb-4">

                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nama Kartu:</label>
                                    <input type="text" wire:model='name_card'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('name_card')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nomor Kartu :</label>
                                    <input type="text" wire:model='number_rek'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('number_rek')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Metode/Bank:</label>
                                    <input type="text" wire:model='metode'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('metode')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                                @if ($itemEdit)
                                    <button wire:click.prevent="edit({{ $itemID }})" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Save
                                    </button>
                                @elseif($itemCreate)
                                    <button wire:click.prevent="create()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Save
                                    </button>
                                @endif

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
            </x-jet-dialog-modal>

        @endif

        @if ($itemDelete)
            <x-jet-dialog-modal wire:model='itemDelete'>
                    <x-jet-validation-errors/>
                    <x-slot name="title"></x-slot>
                <x-slot name="content">
                    <form>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                            <div class="">

                                <div class="mb-4">

                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">APakah Anda Yaki Ingin
                                        Menghapus?:</label>

                                </div>
                            </div>

                        </div>



                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                                <button wire:click.prevent="delete({{ $itemID }})" type="button"
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
            </x-jet-dialog-modal>
        @endif

        @if ($itemCreate)
            <x-jet-dialog-modal wire:model="itemCreate">
                <x-slot name="title">
                    <x-jet-validation-errors/>
                </x-slot>
                <x-slot name="content">
                    <form>

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                            <div class="">

                                <div class="mb-4">

                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nama Kartu:</label>
                                    <input type="text" wire:model='name_card'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('name_card')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Nomor Kartu :</label>
                                    <input type="text" wire:model='number_rek'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('number_rek')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Metode/Bank:</label>
                                    <input type="text" wire:model='metode'
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="xxxxxx" wire:model="title">
                                    @error('metode')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>



                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                                @if ($itemEdit)
                                    <button wire:click.prevent="edit({{ $itemID }})" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        edit
                                    </button>
                                @elseif($itemCreate)
                                    <button wire:click.prevent="create()" type="button"
                                        class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        simpan
                                    </button>
                                @endif

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
            </x-jet-dialog-modal>


        @endif

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <x-table id="MetodeTable" class="w-full whitespace-no-wrap">
                    <thead>
                        <x-tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b   bg-gray-50      ">
                            <x-th class="px-4 py-3">No</x-th>
                            <x-th class="px-4 py-3">Name Card</x-th>
                            <x-th class="px-4 py-3">Number Card</x-th>
                            <x-th class="px-4 py-3">Metode</x-th>
                            <x-th class="px-4 py-3">Actions</x-th>
                        </x-tr>
                    </thead>
                    <tbody class="bg-white divide-y     ">
                        @foreach ($payment as $payments)
                            <x-tr class="text-gray-700   ">
                                <x-td class="px-4 py-3">
                                    1
                                </x-td>
                                <x-td class="px-4 py-3 text-sm">
                                    {{ $payments->name_card }}
                                </x-td>
                                <x-td class="px-4 py-3 text-sm">
                                    {{ $payments->number_rek }}
                                </x-td>
                                <x-td class="px-4 py-3 text-sm">
                                    {{ $payments->metode }}
                                </x-td>
                                <x-td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button wire:click='EditModal({{ $payments->id }})'
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg    focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                        <button wire:click='deleteModal({{ $payments->id }})'
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg    focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </x-td>
                            </x-tr>
                        @endforeach
                    </tbody>
                </x-table>
            </div>
        </div>
    </div>

</div>
