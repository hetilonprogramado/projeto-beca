<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => '
        inline-flex items-center px-4 py-2
        bg-[#4d0c0c] border border-transparent
        rounded-md font-semibold text-xs
        text-white uppercase tracking-widest
        hover:bg-[#3b0f0f]
        focus:bg-[#3b0f0f]
        active:bg-[#2a0b0b]
        focus:outline-none
        focus:ring-2 focus:ring-[#400d0a]
        focus:ring-offset-2
        transition ease-in-out duration-150
    '
]) }}>
    {{ $slot }}
</button>
