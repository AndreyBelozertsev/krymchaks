@extends('layouts.app')
@section('title', 'Аудио')
@section('content')
{{ Breadcrumbs::render('media.audios.index') }}
<section class="section-media-audios my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Аудио
                </x-title>
            </div> 
        @forelse ($audios as $audio)
            <x-item :item=$audio :url="route('media.audios.show',['audio'=> $audio->slug])" />
        @empty
        @endforelse
        <div class="flex w-full justify-center my-3">
            {{ $audios->onEachSide(1)->links() }}
        </div>
    </div>
</section>
@endsection