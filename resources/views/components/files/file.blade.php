@props(['files'])
@foreach($files as $file)
    <div class="block relative">
        <a class="icons_download pl-6 hover:text-primary-blue" target="_blank" href="{{ asset($file['url']) }}">Скачать</a>
    </div>
@endforeach