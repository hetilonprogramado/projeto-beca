@props(['value'])

<label {{ $attributes->merge([
    'class' => "block font-medium text-sm text-[#400d0a] font-['Bree_Serif']"
]) }}>
    {{ $value ?? $slot }}
</label>
