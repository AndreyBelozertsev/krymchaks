@props(['files'])
@foreach($files as $file)

<div class="block">
    <p>{{ $loop->iteration }}. {{ $file['title'] }}</p>
    <audio controls>
        <source src="{{ asset($file['url']) }}">
        Тег audio не поддерживается вашим браузером. 
    </audio>
</div>
@endforeach