@extends('layouts/home')

@section('content')
    <div class="max-w-md mx-auto bg-slate-900 rounded-lg overflow-hidden shadow-lg mb-16 border border-blue-500">
        <div class="px-6 py-4">
            <h2 class="text-2xl font-bold mb-2 text-blue-400">Create Product</h2>
            <form action="{{ route('inventoryLog.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="product_name" class="block text-blue-400 text-sm font-bold mb-2">Nama Produk:</label>
                    <div class="relative">
                        <select name="product_id" id="product_id"
                            class="appearance-none w-full px-3 py-2 bg-black border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 text-blue-400"
                            required>
                            <option value="">Select Product</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06 0L10 10.88l3.71-3.67a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="type" class="block text-blue-400 text-sm font-bold mb-2">Type:</label>
                    <div class="relative">
                        <select name="type" id="type"
                            class="appearance-none w-full px-3 py-2 bg-black border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 text-blue-400"
                            required>
                            <option value="">Select Type</option>
                            <option value="restock">Re-stock</option>
                            <option value="sold">Sold</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                            <svg class="w-5 h-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06 0L10 10.88l3.71-3.67a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 010-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="quantity" class="block text-blue-400 text-sm font-bold mb-2">Jumlah:</label>
                    <input type="number" name="quantity" id="quantity"
                        class="w-full px-3 py-2 bg-black border border-blue-500 rounded-md focus:outline-none focus:border-blue-400 text-blue-400"
                        required min="0">
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('inventoryLog.index') }}"
                        class="px-4 py-2 bg-red-500 text-black rounded-md hover:bg-red-700 transition duration-300 shadow-md mr-2">Kembali</a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 transition duration-300 shadow-md">Create</button>
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
