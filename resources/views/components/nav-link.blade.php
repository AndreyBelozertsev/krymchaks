@props(['active','sub_items'])

@php
$classes = ($active ?? false)
            ? 'block py-2 pr-4 pl-3 md:p-0'
            : 'block py-2 pr-4 pl-3 md:p-0';
@endphp
@if($sub_items->count())
    <li>
        <button id="dropdownNavbarButton" data-dropdown-toggle="dropdownNavbar-{{ str($slot)->slug() }}" class="flex justify-between items-center py-2 pr-4 pl-3 w-full md:border-0 md:p-0 md:w-auto">{{ $slot }}
            <svg class="ml-1 w-4 h-4 text-primary-blue" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownNavbar-{{ str($slot)->slug() }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownNavbarButton">
                @forelse ($sub_items as $item)
                    <li>
                        <a href="{{$item->url}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$item->title}}</a>
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