@extends('layouts.app')


@section('content')
    @php
        dump($mainPost);
    @endphp
    ---
    @forelse ($posts as $post)
        @php
            dump($post);
        @endphp
    @empty
        
    @endforelse
    ---
    @forelse ($types as $type)
        @php
            dump($type);
        @endphp
    @empty

    @endforelse
    ----
    @forelse ($places as $place)
        @php
            dump($place);
        @endphp
    @empty

    @endforelse
    ----
    @forelse ($places as $place)
        @php
            dump($place);
        @endphp
    @empty
        
    @endforelse
@endsection