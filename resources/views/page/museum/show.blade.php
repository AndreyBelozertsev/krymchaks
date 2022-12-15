@extends('layouts.app')
@section('title', $museum->title)
@section('content')
{{ Breadcrumbs::render('museum.show', $museum) }}
<section class="section-museum">
    <x-content :item=$museum /> 
</section>
@endsection