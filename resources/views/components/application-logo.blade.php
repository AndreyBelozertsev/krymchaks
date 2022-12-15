@php
    $classes = 'flex gap-5 logo-container"';
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    <div class="logo__img-wrapper pr-5 max-h-20 h-auto">
        <img src="{{ asset('images/services/logo.png') }}" {{ $attributes  }} >
    </div>
    <div class="logo__text-wrapper pl-3 flex items-center">
        <span class="text-sm text-white font-bold">КРЫМ НАШ</br>ДОМ РОДНОЙ</span>
    </div> 
</div>    
   