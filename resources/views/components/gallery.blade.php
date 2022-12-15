@props(['photos' => []])
<div class="flex gap-4 justify-center flex-wrap" id="lightgallery">
    @forelse ($photos as $photo)
        <a class="w-full md:w-1/2 lg:w-1/4 h-40 overflow-hidden" 
            href="{{ asset($photo['url']) }}"
            data-lg-size="1600-2400"
            data-sub-html="<h4>{{ $photo['title'] }}</h4><p>{{ $photo['desc'] }}</p>">
            <img class="w-full" alt="{{ $photo['title'] }}" src="{{asset($photo['url']) }}" />
        </a> 
    @empty      
    @endforelse
</div>