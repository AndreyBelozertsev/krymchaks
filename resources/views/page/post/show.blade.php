@extends('layouts.app')
@section('title', $post->title)
@section('content')
{{ Breadcrumbs::render('post.show', $post) }}
<section class="section-post">
    <x-content :item=$post /> 
</section>

@endsection