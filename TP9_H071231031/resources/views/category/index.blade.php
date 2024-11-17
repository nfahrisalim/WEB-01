@extends('layouts.home')

@section('content')
    <div>
        <div class="flex justify-end mr-14">
            <a href="{{ route('category.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded-md transition duration-300 shadow-md">
                Tambah Kategori
            </a>
        </div>
        <table class="table-auto w-11/12 border border-collapse mt-5 mx-auto bg-black">
            <thead class="bg-slate-900 border-blue-500 border-b">
                <tr>
                    <th scope="col"
                        class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">
                        Kategori
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">
                        Deskripsi
                    </th>
                    <th scope="col"
                        class="px-4 py-2 text-center text-base font-medium text-blue-400 uppercase tracking-wider">
                        Pilihan
                    </th>
                </tr>
            </thead>
            <tbody class="bg-slate-900 divide-y divide-blue-500">
                @foreach ($categories as $category)
                    <tr class="border-b border-blue-500 hover:bg-blue-900 transition duration-300">
                        <td class="px-4 py-2 text-center font-medium text-blue-400 tracking-wider">
                            {{ $category->name }}
                        </td>
                        <td class="px-4 py-2 text-center font-medium text-blue-400 tracking-wider">
                            {{ $category->description }}
                        </td>
                        <td class="px-4 py-2 text-center font-medium text-blue-400 tracking-wider">
                            <a href="{{ route('category.edit', $category->id) }}"
                                class="inline-block w-24 text-center hover:text-blue-300 text-blue-400 font-bold py-2 px-4 rounded-md transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 0 1 0 2.828l-1.828 1.828-2.828-2.828L14.586 2.586a2 2 0 0 1 2.828 0zM2 13.586V17h3.414l9.293-9.293-2.828-2.828L2 13.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST"
                                onsubmit="return confirm('Apakah kamu yakin ingin menghapus kategori?')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="w-24 text-center hover:text-red-500 text-blue-400 font-bold py-2 px-4 rounded-md transition duration-300">
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
    .bg-slate-900, .bg-black {
        background-color: #0a0a0a;
    }
    
    .text-blue-400 {
        color: #00d9ff;
    }

    .border-blue-500 {
        border-color: #00d9ff;
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

    .hover\:text-red-500:hover {
        color: #cc0000;
    }

    .hover\:text-blue-300:hover {
        color: #66e0ff;
    }
</style>
