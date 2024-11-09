@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
    <section class="bg-white shadow-lg rounded-lg p-8 mt-8 mb-24">
        <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Contact Us</h2>
        <form>
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
            </div>
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition">
            </div>
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" rows="5" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition resize-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">Submit</button>
        </form>
    </section>
@endsection
