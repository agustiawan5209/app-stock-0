<button {{ $attributes->merge(['type' => 'button', 'class' => 'appearance-none flex items-center justify-center bg-red-500 text-white shadow border border-gray-500 rounded-lg py-3 px-3 leading-tight hover:bg-red-600 hover:text-white focus:outline-none']) }}>
    {{ $slot }}
</button>
