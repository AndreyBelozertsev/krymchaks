@extends('layouts.app')
@section('title', $audio->title)
@section('content')
{{ Breadcrumbs::render('media.audios.show', $audio) }}
<section class="section-media-audio">
    <x-content :item=$audio /> 
</section>
@endsection