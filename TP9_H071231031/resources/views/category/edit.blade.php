@extends('layouts.home')

@section('content')
    <div class="max-w-md mx-auto bg-slate-900 rounded-lg overflow-hidden shadow-lg mb-16 border border-blue-500">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold mb-2 text-blue-400">Edit Kategori</h2>
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-blue-400 text-sm font-bold mb-2">Nama:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 bg-black border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 text-blue-400"
                        value="{{ $category->name }}" required>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-blue-400 text-sm font-bold mb-2">Deskripsi:</label>
                    <input type="text" name="description" id="description"
                        class="w-full px-3 py-2 bg-black border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 text-blue-400"
                        value="{{ $category->description }}" required>
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('category.index') }}"
                        class="px-4 py-2 bg-red-500 text-black rounded-md hover:bg-red-700 transition duration-300 shadow-md mr-2">Kembali</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 transition duration-300 shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<style>
    .bg-slate-900 {
        background-color: #0a0a0a;
    }

    .text-blue-400 {
        color: #00d9ff;
    }

    .bg-black {
        background-color: #0a0a0a;
    }
    
    .border-blue-500 {
        border-color: #00d9ff;
    }

    .focus\:border-blue-400:focus {
        border-color: #00d9ff;
        box-shadow: 0px 0px 6px rgba(0, 217, 255, 0.8);
    }

    .bg-blue-500 {
        background-color: #00d9ff;
        color: #0a0a0a;
        box-shadow: 0px 0px 10px rgba(0, 217, 255, 0.6);
    }

    .bg-blue-500:hover {
        background-color: #0099cc;
        box-shadow: 0px 0px 15px rgba(0, 153, 204, 0.8);
    }

    .bg-red-500 {
        background-color: #ff4d4d;
    }

    .bg-red-500:hover {
        background-color: #cc0000;
    }
</style>
