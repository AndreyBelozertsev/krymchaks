@extends('layouts.app')
@section('title', 'Печатная продукция')
@section('content')
{{ Breadcrumbs::render('printed-productions.index') }}
<section class="section-printed-productions my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Печатная продукция
                </x-title>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse ($products as $product)
                    <x-file :item=$product :url="route('printed-productions.show',['product'=> $product->slug])" />
                @empty
                @endforelse
            </div>
        <div class="flex w-full justify-center my-3">
            {{ $products->onEachSide(1)->links() }}
        </div>
    </div>
</section>
@endsection
