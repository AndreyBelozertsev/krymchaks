@props(['title'=>''])
@php
    $classes ='container';
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    @if($title)
        <div>
            <div class="py-4">
                <x-title class="text-4xl font-bold">
                    {{ $title }}
                </x-title>
            </div>
    </div>
    @endif
    <div class="map-wrap px-4">
        <div class="flex mt-10 rounded-xl overflow-hidden">
            <div id="map" class="w-full" style="height: 400px"></div>
        </div>
    </div>
    <script>
        var mapObjects = {{ Js::from($places) }};
        var center = [{{ $center }}];
    </script>
</div>