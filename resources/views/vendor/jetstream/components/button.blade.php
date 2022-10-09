<button {{ $attributes->merge(['type' => 'submit', 'class' => 'appearance-none flex items-center justify-center bg-primary text-primary shadow border border-primary rounded-lg py-3 px-3 leading-tight hover:bg-primary hover:text-primary focus:outline-none text-black']) }}>
    {{ $slot }}
</button>
