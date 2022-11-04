@extends('layouts.app')


@section('content')
    @php
        print_r($mainPost);
    @endphp
    ---
    @forelse ($posts as $post)
        @php
            print_r($post);
        @endphp
    @empty
        
    @endforelse
    ---
    @forelse ($categories as $category)
        @php
            print_r($category);
        @endphp
    @empty

    @endforelse
    ----
    @forelse ($places as $place)
        @php
            print_r($place);
        @endphp
    @empty

    @endforelse

@endsection