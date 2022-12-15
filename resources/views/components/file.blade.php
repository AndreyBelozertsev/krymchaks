@props(['item','url'])

<div class="flex flex-col mb-12 pb-8 border hover:border-primary-blue ">
    <a class="block relative w-full flex-shrink-0 min-h-256 overflow-hidden" href="{{ $url }}">
        <img class="w-full hover:scale-110 duration-300" src="{{ $item->makeThumbnail('345x320') }}">
    </a>
    <div class="mt-1 relative mx-5">
        <a href="{{ $url }}" class="flex font-bold text-gray-700 hover:text-primary-blue text-lg pb-4">{{ $item->title }}</a>
        <a target="_blank" href="{{ collect($item->files_processed)->value('url') }}" class="flex icons_download text-gray-600 text-base pl-6">Скачать</a>
    </div>
</div>