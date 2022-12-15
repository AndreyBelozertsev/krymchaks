@php
    $classes = 'flex mt-4 lg:mt-0 lg:text-sm lg:font-medium"';
@endphp
<ul {{ $attributes->merge(['class' => $classes]) }}>
    @forelse ($items as $item)
        <x-nav-bottom-link :href="$item->url" :active="$item->child" :sub_items="$item->child">
            {{$item->title}}
        </x-nav-bottom-link>
    @empty 
    @endforelse  
</ul>