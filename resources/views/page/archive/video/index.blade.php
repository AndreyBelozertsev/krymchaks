@extends('layouts.app')

@section('content')

    @php
        print_r($videos);
    @endphp

{{ $videos->links() }}

@endsection