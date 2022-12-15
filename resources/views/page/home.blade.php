@extends('layouts.app')

@section('content')
    <section>
        <div class="flex">
            <div class="first-screen__left w-full lg:w-1/2 text-white bg-150% bg-top bg-no-repeat flex justify-center px-8 lg:px-16 flex-col py-8"
                style="background-image: linear-gradient(rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0.85)),
              url({{ asset('images/services/crimea-main.png') }});background-size: contain;background-position: center center;">
                <div class="px-2 py-12 lg:py-0 lg:px-10 uppercase text-center lg:text-left font-bold">
                    <h1 class="text-2xl sm:text-3xl xl:text-4xl pb-5">Крымское общество Крымчаков</h1>
                    <h2 class="text-primary-blue text-3xl sm:text-4xl xl:text-5xl">“Кърымчахлар”</h2>
                </div>
            </div>
            <div class="first-screen__right w-0 lg:w-1/2">
                <img src="{{ asset('images/services/wrap.jpg') }}">
            </div>
        </div>
    </section>
    <section class="section-about" data-aos="fade-up" data-aos-duration="1000" >
        <div class="container mt-12">
            <div>
                <x-title class="text-4xl font-bold">
                    О нас
                </x-title>
            </div>    
            <div class="flex mt-10">
                <div class="flex flex-col md:flex-row items-start">
                    <ul class="nav nav-tabs text-center md:text-left flex md:flex-col flex-wrap list-none pl-0 pr-0 md:pr-10 md:mr-4" id="tabs-tabVertical" role="tablist">
                        @forelse ($categories as $category)
                            <li class="nav-item flex-grow" role="presentation">
                                <a href="#tabs-{{ $category->slug }}Vertical" class="nav-link text-gray-600 block text-base px-3 md:px-0 pr-0 md:pr-6 py-2 my-1 md:my-2 {{ $loop->first ? 'active' : '' }}" 
                                id="tabs-{{ $category->slug }}-tabVertical" data-bs-toggle="pill" data-bs-target="#tabs-{{ $category->slug }}Vertical" role="tab"
                                aria-controls="tabs-{{ $category->slug }}Vertical" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->title  }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                    <div class="tab-content pt-6 md:pt-0 pl-0 md:pl-10" id="tabs-tabContentVertical">
                        @forelse ($categories as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tabs-{{ $category->slug }}Vertical" role="tabpanel" aria-labelledby="tabs-{{ $category->slug }}-tabVertical">
                                <div class="flex flex-wrap flex-col">
                                    <div class="tab-content__text text-gray-600">{!! $category->description !!}</div>
                                    <div class="tab-content__button mt-10 pb-2">
                                        <a class="bg-primary-blue text-white text-base rounded-3xl px-8 py-2" href="{{ route('about.category.index', ['category'=> $category->slug])}}">Больше информации</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-news" data-aos="fade-up" data-aos-duration="1000">
        <div class="container mt-12">
            <div class="py-4">
                <x-title class="text-4xl font-bold">
                    Новости
                </x-title>
            </div>
            <div>
                @empty(!$mainPost)
                    <div class="news-top w-full">
                        <a href="{{ route('post.show',['post'=>$mainPost->slug]) }}">
                            <div class="w-full text-white relative rounded-xl md:h-96 lg:h-500 bg-150% bg-top bg-no-repeat flex justify-end flex-col" style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75)),
                                url({{ asset($mainPost->thumbnail) }});background-size:cover;background-position: center center;">
                                <div class="news-top__info p-8 flex flex-col gap-6">
                                    <span class="text-xl">{{ $mainPost->date }}</span>
                                    <h2 class="text-2xl">{{ $mainPost->title }}</h2>
                                    @isset($mainPost->category->title )
                                        <div>
                                            <span class="bg-primary-blue text-xs text-white rounded-3xl px-8 py-2">{{ $mainPost->category->title }}</span>
                                        </div>
                                    @endisset
                                </div>
                            </div>
                        </a>
                    </div>
                @endempty
                <div class="flex flex-wrap lg:flex-nowrap my-6 gap-0 lg:gap-4">
                @forelse ($posts as $post)
                    <div class="flex flex-col items-center lg:block w-full px-2 lg:px-0 md:w-1/2 lg:w-1/4 rounded-xl">
                        <div>
                            <a href="{{ route('post.show',['post'=>$post->slug]) }}">
                                <img src="{{ $post->makeThumbnail('250x150','fit') }}">
                            </a>
                        </div>
                        <div class="flex flex-col gap-2 lg:gap-4">
                            @isset($post->category->title )
                                <div class="pt-4">
                                    <span class="bg-primary-blue text-xs text-white rounded-3xl px-8 py-2">{{ $post->category->title }}</span>
                                </div>
                            @endisset
                            <div>
                                <span class="text-sm text-gray-400">{{ $post->date }}</span>
                            </div>
                            <div>
                                <h2 class="text-lg">{{ $post->title }}</h2>
                            </div>
                            <div class="pb-6">
                                <a class="text-primary-blue flex" href="{{ route('post.show',['post'=>$post->slug]) }}">Подробнее <span class="pl-2 font-bold text-lg">></span></a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                </div>
            <div>
        </div>
    </section>
    <section class="section-map mb-10" data-aos="fade-up" data-aos-duration="1000">
        <x-map title="Объекты" class="mt-12" />
    </section>
@endsection