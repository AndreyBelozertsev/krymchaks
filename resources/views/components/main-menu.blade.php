@php
    $classes = 'flex mt-4 lg:mt-0 lg:text-sm lg:font-medium"';
@endphp
<ul {{ $attributes->merge(['class' => $classes]) }}>
    @forelse ($items as $item)
        <x-nav-link :href="$item->url" :active="$item->child" :sub_items="$item->child">
            {{$item->title}}
        </x-nav-link>
    @empty 
    @endforelse  
</ul>