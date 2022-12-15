@extends('layouts.app')
@section('title', $video->title)
@section('content')
{{ Breadcrumbs::render('media.videos.show', $video) }}
<section class="section-media-video">
    <x-content :item=$video show_thumbnail=0 /> 
</section>
@endsection