@props(['files'])
@foreach($files as $file)

<div class="block">
    <video controls>
        <source src="{{ asset($file['url']) }}">
        Тег audio не поддерживается вашим браузером. 
    </video>
</div>
@endforeach