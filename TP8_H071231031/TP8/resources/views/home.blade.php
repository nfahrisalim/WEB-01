@extends('layouts.master') 
@section('title', 'Home') 
@section('content') 

<!-- Hero Section --> 
<section class="relative bg-gray-800 text-white py-20 rounded-md overflow-hidden"> 
    <iframe class="absolute inset-0 w-full h-full object-cover opacity-50" src="https://www.youtube.com/embed/GDlkCkcIqTs?autoplay=1&loop=1&mute=1&playlist=GDlkCkcIqTs" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen> 
    </iframe> 
    <div class="relative z-0 text-center"> <!-- Change z-10 to z-0 -->
        <h1 class="text-5xl font-bold text-white">iPhone 16</h1>
        <p class="mt-4 text-lg">Unleash whole new levels of creativity, productivity, and possibility.</p> 
        <a href="#" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded">Buy now</a> 
    </div> 
</section> 

<!-- Features Section --> 
<section class="mt-10"> 
    <h2 class="text-2xl font-bold mb-6 text-center">Features</h2> 
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6"> 
        <div class="bg-white shadow rounded-lg p-6 text-center"> 
            <img src="{{ asset('images/I16.png') }}" alt="Feature 1" class="h-40 mx-auto"> 
            <h5 class="text-lg font-semibold mt-4">108 MP + 48 MP + 12 MP Dual Rear Camera</h5> 
        </div> 
        <div class="bg-white shadow rounded-lg p-6 text-center"> 
            <img src="{{ asset('images/AI.png') }}" alt="Feature 2" class="h-40 mx-auto"> 
            <h5 class="text-lg font-semibold mt-4">Apple Intelligence</h5> 
        </div> 
        <div class="bg-white shadow rounded-lg p-6 text-center"> 
            <img src="{{ asset('images/A18.jpg') }}" alt="Feature 3" class="h-40 mx-auto"> 
            <h5 class="text-lg font-semibold mt-4">A18 Bionic Chip</h5> 
        </div> 
    </div> 
</section> 

@endsection
