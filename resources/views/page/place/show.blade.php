@extends('layouts.app')
@section('title', $place->title)
@section('content')
{{ Breadcrumbs::render('place.show', $place ) }}
<section class="section-place">
    <x-content :item=$place />
</section>
@endsection