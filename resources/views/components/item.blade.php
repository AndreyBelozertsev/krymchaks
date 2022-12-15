@props(['item','url','category' =>''])
<div class="flex flex-col lg:flex-row mb-12">
    <a class="block relative 2xl:w-1/4 bg-cover flex-shrink-0 lg:min-h-225 lg:w-1/3 min-h-225 xs:min-h-350 w-full" style="background-image: linear-gradient(to right, rgba(2, 13, 37, 0.6) 30%, transparent 70%),url({{ $item->makeThumbnail('345x320') }});" href="{{ $url }}">
        <div class="bg-primary-blue flex pl-5 mt-5 font-bold text-sm text-white items-center justify-between h-10 w-3/4" style="border-radius:0 14px 14px 0;">
            {{ $item->date }}	
        </div>
        @if($category)
            <div class="absolute bottom-6 left">
                <span class="bg-primary-blue text-xs text-white rounded-r-3xl px-8 py-2">{{ $category }}</span>
            </div>
        @endif
    </a>
    <div class="mt-1 lg:ml-4">
        <a href="{{ $url }}" class="flex font-bold text-gray-800 lg:text-lg">{{ $item->title }}</a>
        <p>
            <a href="{{ $url }}" class="mt-2 text-gray-500 font-normal">{!! $item->description !!}</a>
        </p>
    </div>
</div>