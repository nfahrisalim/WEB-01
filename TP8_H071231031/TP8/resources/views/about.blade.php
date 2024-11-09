@extends('layouts.master')

@section('title', 'About')

@section('content')
    <!-- Specs Section -->
    <section class="specs-section container mx-auto my-5 px-4" id="specs">
        <h2 class="mb-4 text-center text-3xl font-semibold">iPhone 16 Specifications</h2>
        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-md overflow-hidden">
                <tbody class="divide-y">
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Processor</th>
                        <td class="p-4 text-gray-700">
                            | CPU: A18 Bionic | Speed: 3.46GHz | Type: Hexa-Core
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Display</th>
                        <td class="p-4 text-gray-700">
                            | Size: 6.7" | Resolution: 2778 x 1284 | Technology: Super Retina XDR OLED
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Battery</th>
                        <td class="p-4 text-gray-700">
                            | Capacity: 4400mAh | Type: Li-Ion | Charging: 30W Fast Charging, 15W MagSafe Wireless Charging
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Camera</th>
                        <td class="p-4 text-gray-700">
                            | Main: 48 MP + 12 MP Ultra-Wide + 12 MP Telephoto | Front: 12 MP | Zoom: 3x Optical Zoom
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Storage & RAM</th>
                        <td class="p-4 text-gray-700">
                            | Storage Options: 128GB, 256GB, 512GB | RAM: 6GB
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Operating System</th>
                        <td class="p-4 text-gray-700">
                            | OS: iOS 18
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Connectivity</th>
                        <td class="p-4 text-gray-700">
                            | 5G Support | Wi-Fi 6E | Bluetooth 5.2 | USB-C
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Security</th>
                        <td class="p-4 text-gray-700">
                            | Face ID | In-Display Fingerprint Sensor (Future Feature)
                        </td>
                    </tr>
                    <tr>
                        <th class="p-4 text-left text-gray-800 font-semibold">Dimensions & Weight</th>
                        <td class="p-4 text-gray-700">
                            | Dimensions: 160.8 x 78.1 x 7.4 mm | Weight: 204g
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="reviews-section container mx-auto my-5 px-4" id="reviews">
        <h2 class="mb-4 text-center text-3xl font-semibold">Customer Reviews</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">John Doe</h5>
                <p class="mt-2 text-gray-600">The iPhone 16 is stunning. The display and camera are outstanding, and performance is incredibly smooth!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Jane Smith</h5>
                <p class="mt-2 text-gray-600">I love the sleek design and the powerful performance of the A18 chip. This phone is a game changer!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Alex Johnson</h5>
                <p class="mt-2 text-gray-600">The camera is absolutely amazing, especially with the 3x optical zoom. My photos look fantastic!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Sarah Williams</h5>
                <p class="mt-2 text-gray-600">This phone has great battery life and fast charging. It’s perfect for all-day use!</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Michael Brown</h5>
                <p class="mt-2 text-gray-600">The iPhone 16 is worth every penny! The new features are incredible, and the performance is flawless.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h5 class="text-lg font-semibold">Emily Davis</h5>
                <p class="mt-2 text-gray-600">Perfect design, amazing display, and lightning-fast performance. This is the best iPhone yet!</p>
            </div>
        </div>
    </section>
@endsection
