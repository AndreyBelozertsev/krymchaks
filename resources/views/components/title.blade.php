@php
    $classes = '';
@endphp
<h2 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h2>
