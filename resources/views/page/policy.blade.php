@extends('layouts.app')

@section('title', 'Политика обработки персональных данных')
@section('content')
{{ Breadcrumbs::render('policy') }}
<section class="section-policy">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl flex flex-wrap lg:flex-nowrap gap-6 my-12">
        <div class="w-full px-6 py-8 ">
            <div class="mb-4">
                <x-title class="text-4xl text-gray-800 font-bold">
                    Политика обработки персональных данных
                </x-title>
            </div> 
            <div class="flex flex-col mt-10">
                <div class="">
                    {!! $policy->value !!}
                </div>
            </div>
        </div>  
    </div>
</section>

@endsection