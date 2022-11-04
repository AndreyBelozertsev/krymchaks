@extends('layouts.app')

@section('content')

    @php
        print_r($audios);
    @endphp

{{ $audios->links() }}

@endsection