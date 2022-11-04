@extends('layouts.app')

@section('content')

    @php
        print_r($posts);
    @endphp

{{ $posts->links() }}

@endsection