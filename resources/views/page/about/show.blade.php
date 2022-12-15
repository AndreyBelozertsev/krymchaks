@extends('layouts.app')
@section('title', $about->title)
@section('content')
{{ Breadcrumbs::render('about.article.show', $about, $category) }}
<section class="section-about">
    <x-content :item=$about />
</section>
@endsection