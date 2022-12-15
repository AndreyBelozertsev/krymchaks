@extends('layouts.app')
@section('title', 'Объекты')
@section('content')
{{ Breadcrumbs::render('places') }}
<section class="section-map">
    <div class="container px-6 pb-8 bg-gray-100 rounded-xl shadow-2xl flex flex-wrap lg:flex-nowrap gap-6 mb-12">
        <div class="w-full px-6 py-8 ">
            <div class="flex flex-col">
                <x-map title="Объекты" />
            </div>
        </div>
    </div>
</section>
@endsection