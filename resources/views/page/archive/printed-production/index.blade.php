@extends('layouts.app')

@section('content')

    @php
        print_r($products);
    @endphp

{{ $products->links() }}

@endsection