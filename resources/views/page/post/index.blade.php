@extends('layouts.app')
@section('title', 'Новости')
@section('content')
{{ Breadcrumbs::render('posts') }}
<section class="section-about-category my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Новости
                </x-title>
            </div> 
        @forelse ($posts as $post)
            <x-item :item=$post :url="route('post.show',['post'=> $post->slug])" :category="$post->category ? $post->category->title : ''" />
        @empty
        @endforelse
        <div class="flex w-full justify-center my-3">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    </div>
</section>

@endsection