@extends('layouts.profile')

@section('title', 'User Profile')

@section('content')
    <div class="flex flex-col items-center">
        <img src="{{ asset('images/Tron.jpg') }}" alt="User Image" class="w-32 h-32 rounded-full mb-4">
        <h1 class="text-3xl font-bold mb-2">Welkam Masbro!</h1>
        <p class="text-lg">Ini adalah halaman profil</p>
        <p class="mt-4 text-gray-400">Tekan tombolnya saja untuk lanjut.</p>
        <div class="mt-6">
            <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Tekan disini
            </a>
        </div>
    </div>
@endsection
