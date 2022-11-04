@extends('layouts.app')

@section('content')

    @php
        print_r($abouts);
    @endphp

{{ $abouts->links() }}

@endsection