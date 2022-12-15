@extends('layouts.app')
@section('title', $product->title)
@section('content')
{{ Breadcrumbs::render('printed-productions.show', $product) }}
<section class="section-printed-product__single">
    <x-content :item=$product /> 
</section>
@endsection