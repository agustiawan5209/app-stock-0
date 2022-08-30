<div class="overflow-x-auto">
    <div class="min-w-max min-h-max flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
        <div class="w-full lg:w-4/5">
            <x-button wire:click='addModal()'>Tambah</x-button>
            <div class="bg-white shadow-md rounded my-6">
                <table {{ $attributes->merge(['class' => 'min-w-max w-full table-auto']) }}>
                    {{ $slot }}
                </table>
            </div>
        </div>


    </div>
</div>
