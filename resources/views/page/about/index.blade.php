@extends('layouts.app')

@section('title', "Статьи - $category->title")
@section('content')
{{ Breadcrumbs::render('about.article.index', $category) }}
<section class="section-about-category my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    {{ $category->title }}
                </x-title>
            </div> 
        @forelse ($abouts as $about)
            <x-item :item=$about :url="route('about.article.show',['category'=> $category->slug, 'about'=> $about->slug])" /> 
        @empty
        @endforelse
        <div class="flex w-full justify-center my-3">
            {{ $abouts->onEachSide(1)->links() }}
        </div>
    </div>
</section>
@endsection