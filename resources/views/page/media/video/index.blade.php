@extends('layouts.app')
@section('title', 'Видео')
@section('content')
{{ Breadcrumbs::render('media.videos.index') }}
<section class="section-media-videos my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Видео
                </x-title>
            </div> 
        @forelse ($videos as $video)
            <x-item :item=$video :url="route('media.videos.show',['video'=> $video->slug])" />
        @empty
        @endforelse
        <div class="flex w-full justify-center my-3">
            {{ $videos->onEachSide(1)->links() }}
        </div>
    </div>
</section>
@endsection