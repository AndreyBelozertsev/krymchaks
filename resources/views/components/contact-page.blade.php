<div>
    @php
        print_r($contacts);
    @endphp

    <form method="POST" action="{{ route('sendContactForm') }}">
        @csrf
        <input type="text" name="name">
        <input type="email" name="email">
        <input type="text" name="message">
        <input type="checkbox" name="agree" value="true">
        <input type="submit">
    </form>

</div>    