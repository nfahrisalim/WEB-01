@extends('layouts.home')

@section('content')
    <div>
        <div class="flex justify-end mr-14">
            <a href="{{ route('inventoryLog.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-md transition duration-300 shadow-md">
                Kelola Produk
            </a>
        </div>
        <table class="table-auto w-11/12 border border-collapse mt-5 mx-auto bg-black">
            <thead>
                <tr class="border-b border-blue-500">
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Nama</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Tipe</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Jumlah</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Tanggal</th>
                    <th class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">Pilihan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inventoryLogs as $inventoryLog)
                    <tr class="border-b border-blue-500 hover:bg-blue-900 transition duration-300">
                        <td class="px-4 py-2 text-center text-blue-400">{{ $inventoryLog->product->name }}</td>

                        <td class="px-4 py-2 text-center">
                            <span
                                class="{{ $inventoryLog->type == 'sold' ? 'bg-red-500' : ($inventoryLog->type == 'restock' ? 'bg-green-500' : '') }} text-black px-2 py-1 rounded-lg shadow-md">
                                {{ $inventoryLog->type }}
                            </span>
                        </td>

                        <td class="px-4 py-2 text-center text-blue-400">{{ $inventoryLog->quantity }}</td>
                        <td class="px-4 py-2 text-center text-blue-400">{{ $inventoryLog->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 text-center">
                            <form action="{{ route('inventoryLog.destroy', $inventoryLog->id) }}" method="POST"
                                onsubmit="return confirm('Yakin mau menghapus produk?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-24 text-center hover:text-red-700 text-blue-400 font-bold py-2 px-4 rounded-md transition duration-300 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M6 7h12v12a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V7zm7-5a1 1 0 0 1 1-1v1h5a1 1 0 1 1 0 2H4a1 1 0 0 1 0-2h5V3a1 1 0 0 1 1-1h4z" />
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
    
    .border-blue-500 {
        border-color: #00d9ff;
    }

    .text-blue-400 {
        color: #00d9ff;
    }

    .hover\:bg-blue-900:hover {
        background-color: #002b3e;
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

    .bg-green-500 {
        background-color: #33cc33;
    }

    .hover\:text-red-700:hover {
        color: #cc0000;
    }
</style>
