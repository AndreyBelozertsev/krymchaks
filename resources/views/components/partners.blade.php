<div class="flex flex-col justify-center gap-12">
    @forelse ($items as $item)
        <div class="text-white text-center text-sm">
            @empty($item->url)
                <img src="{{ asset( $item->makeThumbnail('120xnull','resize') ) }}">
                <p>{{ $item->title }}</p>
            
            @else
                <a href="{{ $item->url }}">
                    <img src="{{ asset( $item->makeThumbnail('120xnull','resize') ) }}">
                </a>
                <a href="{{ $item->url }}">{{ $item->title }}</a>
            @endempty
        </div>
    @empty
        
    @endforelse
</div>