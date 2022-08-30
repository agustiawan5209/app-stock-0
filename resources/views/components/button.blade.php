<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-block px-5 py-2 mx-auto text-white bg-blue-600 rounded-full hover:bg-blue-700 md:mx-0']) }}>
    {{ $slot }}
</button>
