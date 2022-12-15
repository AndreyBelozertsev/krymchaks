@extends('layouts.app')
@section('title', $category->title)
@section('content')
{{ Breadcrumbs::render('about.category.index', $category) }}
<section class="section-about">
    <div class="container p-0 flex flex-wrap lg:flex-nowrap gap-6 my-12">
        <div class="w-full lg:w-2/3 2xl:w-3/4 px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    {{ $category->title }}
                </x-title>
            </div>    
            <div class="flex mt-10">
                <div class="">
                    {{ $category->content }}
                </div>
            </div>
        </div>
        <div class="w-full lg:w-1/3 2xl:w-1/4 px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <span class="font-bold">Тематические статьи</span>
            </div>
            <div>
                @forelse ($abouts as $about)
                    <div class="pb-4">
                        <h2 class="text-lg text-gray-800"><a href="{{ route('about.article.show',['category'=> $category->slug, 'about'=> $about->slug]) }}">{{ $about->title  }}</a></h2>
                        <span class="text-xs text-gray-500 border-solid border-b border-primary-blue">{{ $about->date }}</span>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="text-center">
                <a class="bg-primary-blue text-sm text-white rounded-3xl px-8 py-2" href="{{ route('about.article.index',['category'=>$category->slug]) }}">Больше статей</a>
            </div>
        </div>
    </div>
</section>
@endsection