@props(['item','show_thumbnail'=>true])
<div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl flex flex-wrap lg:flex-nowrap gap-6 my-12">
    <div class="w-full px-6 py-8 ">
        <div class="mb-4">
            <x-title class="text-4xl text-gray-800 font-bold">
                {{ $item->title }}
            </x-title>
        </div>

        @if($show_thumbnail && file_exists(public_path($item->thumbnail)))
            <div class="flex justify-center">
                <img src="{{ $item->makeThumbnail('650xnull','resize') }}">
            </div> 
        @endif 
  
        @if(isset($item->files_processed) && !empty($item->files_processed) )
            <div class="my-3">
                <x-files :files="$item->files_processed" :type="class_basename($item)" />
            </div>
        @endempty  
        <div class="flex flex-col mt-10">
            <div class="">
                {!! $item->content !!}
            </div>
        </div>
        @if(isset($item->gallery) && !empty($item->gallery) )
            <div class="my-3">
                <x-gallery :photos="$item->gallery" />
            </div>
        @endempty
        @isset($item->coordinates)
            <x-map :place=$item />
        @endisset
        @isset($item->date)
            <div class="mt-4">
                <span class="text-gray-500">{{ $item->date }}</span>
            </div>
        @endisset
    </div>  
</div>