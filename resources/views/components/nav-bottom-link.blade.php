@props(['active','sub_items'])

@php
$classes = ($active ?? false)
            ? 'block py-2 pr-4 pl-3 md:p-0 hover:text-white'
            : 'block py-2 pr-4 pl-3 md:p-0 hover:text-white';
@endphp
@if($sub_items->count())
    <li>
        <button data-toogle="{{ str($slot)->slug() }}" class="flex justify-between items-center py-2 pr-4 pl-3 w-full md:border-0 md:p-0 md:w-auto">{{ $slot }}
            <svg class="ml-1 w-4 h-4 text-primary-blue" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div data-toogle-box="{{ str($slot)->slug() }}" class="z-10 w-44 rounded hidden">
            <ul class="py-1 text-sm">
                @forelse ($sub_items as $item)
                    <li>
                        <a href="{{$item->url}}" class="block py-2 px-4 hover:text-white">{{$item->title}}</a>
                    </li>
                @empty
                    
                @endforelse
            </ul>
        </div>
    </li>
@else
    <li>
        <a {{ $attributes->merge(['class' => $classes]) }}>
            {{ $slot }}
        </a>
    </li>
@endif