@props(['files' => [],'type'])

<div class="flex gap-4 flex-wrap">
    @if($type == 'Audio')
        <x-files.audio :files="$files" />
    @elseif($type == 'Video')
        <x-files.video :files="$files" />
    @else
        <x-files.file :files="$files" />
    @endif
</div>