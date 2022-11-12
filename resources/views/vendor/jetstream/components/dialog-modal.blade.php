@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }} >
    <div class="sm:px-6 sm:py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4 mx-0 sm:px-0">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-between px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>
