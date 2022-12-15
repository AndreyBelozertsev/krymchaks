@extends('layouts.app')

@section('title', 'Музей')
@section('content')   
{{ Breadcrumbs::render('museums') }}
<section class="section-about-category my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Музей
                </x-title>
            </div> 
        @forelse ($museums as $museum)
            <x-item :item=$museum :url="route('museum.show',['museum'=> $museum->slug])" />
        @empty
        @endforelse
        <div class="flex w-full justify-center my-3">
            {{ $museums->onEachSide(1)->links() }}
        </div>
    </div>
</section>
@endsection