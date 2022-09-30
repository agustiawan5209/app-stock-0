<button {{ $attributes->merge(['type' => 'submit', 'class' => 'appearance-none flex items-center justify-center bg-blue-100 text-blue-700 shadow border border-blue-500 rounded-lg py-3 px-3 leading-tight hover:bg-blue-200 hover:text-blue-700 focus:outline-none']) }}>
    {{ $slot }}
</button>
