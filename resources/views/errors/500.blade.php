@extends('layouts.app')
@section('content')
<section class="section-error my-8">
    <div class="container px-6 py-8 bg-gray-100 rounded-xl shadow-2xl">
        <div class="mb-4">
            <x-title class="text-4xl text-gray-800 font-bold">
                Ошибка 500!
            </x-title>
        </div> 
        <div class="flex flex-col mt-10">
            <div class="">
                На сервере возникла ошибка!
            </div>
        </div>
    </div>
</section>
@endsection