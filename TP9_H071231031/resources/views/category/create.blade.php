@extends('layouts.home')

@section('content')
    <div class="max-w-md mx-auto bg-black rounded-lg overflow-hidden shadow-lg border border-blue-500 mb-16 glow-effect">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold mb-4 text-blue-400 tracking-wider glow-text">Tambah Kategori</h2>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-blue-400 text-sm font-bold mb-2 glow-text">Nama:</label>
                    <input type="text" name="name" id="name"
                        class="w-full px-3 py-2 bg-black border border-blue-500 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 glow-input"
                        required
                        value="{{ old('name') }}">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-blue-400 text-sm font-bold mb-2 glow-text">Deskripsi:</label>
                    <input type="text" name="description" id="description"
                        class="w-full px-3 py-2 bg-black border border-blue-500 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500 glow-input"
                        required
                        value="{{ old('description') }}">
                </div>
                <div class="flex justify-end mt-6">
                    <a href="{{ route('category.index') }}"
                        class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 hover:shadow-red transition duration-300 mr-2 glow-button">Kembali</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white font-bold rounded-md hover:bg-blue-700 hover:shadow-blue transition duration-300 glow-button">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        .glow-effect {
            box-shadow: 0px 0px 15px rgba(0, 122, 255, 0.8), 0px 0px 30px rgba(0, 122, 255, 0.5);
        }
        .glow-text {
            text-shadow: 0px 0px 8px rgba(0, 122, 255, 0.8);
        }

        .glow-input:focus {
            box-shadow: 0px 0px 10px rgba(0, 122, 255, 0.7), 0px 0px 20px rgba(0, 122, 255, 0.5);
        }

        .glow-button {
            box-shadow: 0px 0px 8px rgba(0, 122, 255, 0.6);
            transition: box-shadow 0.3s;
        }
        
        .glow-button:hover {
            box-shadow: 0px 0px 12px rgba(0, 122, 255, 1), 0px 0px 24px rgba(0, 122, 255, 0.8);
        }

        .hover:shadow-red {
            box-shadow: 0px 0px 10px rgba(255, 0, 0, 0.6);
        }

        .hover:shadow-blue {
            box-shadow: 0px 0px 10px rgba(0, 122, 255, 0.8);
        }
    </style>
@endsection
