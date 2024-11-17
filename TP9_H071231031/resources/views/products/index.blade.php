@extends('layouts.home')

@section('content')
    <div>
        <div class="flex justify-between items-center mr-14 ml-14 mb-10 mt-8">
            <div>
                <div class="w-full mr-4">
                    <label for="category" class="block text-blue-400 text-sm font-bold mb-2">Filter by Category:</label>
                    <form action="{{ route('products.index') }}" method="GET" class="flex items-center">
                        <div class="relative w-full">
                            <select name="category" id="category"
                                class="appearance-none w-full px-3 py-2 border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 bg-black text-blue-400">
                                <option value="">Semua Kategori</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06 0L10 10.88l3.71-3.67a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <button type="submit"
                            class="ml-2 px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 transition duration-300">Filter</button>
                    </form>
                </div>
            </div>
            <div>
                <a href="{{ route('products.create') }}"
                    class="bg-blue-500 hover:bg-blue-700 text-black font-bold px-4 py-2 rounded-md transition duration-300">Tambah
                    Produk</a>
            </div>
        </div>

        <table class="table-auto w-11/12 border border-collapse mt-5 mx-auto bg-black">
            <thead>
                <tr class="border-b border-blue-500">
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Deskripsi</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Harga</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Kategori</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Stok</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-b border-blue-500 hover:bg-blue-900 transition duration-300">
                        <td class="px-4 py-2 text-center text-blue-400">{{ $product->name }}</td>
                        <td class="px-4 py-2 text-center text-blue-400">{{ $product->description }}</td>
                        <td class="px-4 py-2 text-center text-blue-400">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-center text-blue-400">{{ $product->category->name }}</td>
                        <td class="px-4 py-2 text-center text-blue-400">{{ $product->stock }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="inline-block w-24 text-center text-blue-400 hover:text-blue-300 transition duration-300 font-bold py-2 px-4 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 0 1 0 2.828l-1.828 1.828-2.828-2.828L14.586 2.586a2 2 0 0 1 2.828 0zM2 13.586V17h3.414l9.293-9.293-2.828-2.828L2 13.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus produk?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-24 text-center text-blue-400 hover:text-red-500 transition duration-300 font-bold py-2 px-4 rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M6 7h12v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7zm7-5a1 1 0 0 1 1 1v1h5a1 1 0 1 1 0 2H4a1 1 0 0 1 0-2h5V3a1 1 0 0 1 1-1h4z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

<style>
    .bg-black {
        background-color: #0a0a0a; 
    }
    
    .text-blue-400 {
        color: #00d9ff; 
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

    .hover\:bg-blue-900:hover {
        background-color: #002b3e;
    }

    .hover\:text-blue-300:hover {
        color: #66e0ff;
    }

    .hover\:text-red-500:hover {
        color: #ff4d4d;
    }

    .border-blue-500 {
        border-color: #00d9ff;
    }

    .text-blue-500 svg {
        fill: #00d9ff;
    }

    .focus\:border-blue-400:focus {
        border-color: #00d9ff;
        box-shadow: 0px 0px 6px rgba(0, 217, 255, 0.8);
    }
</style>
