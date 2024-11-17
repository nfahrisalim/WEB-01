<nav class="bg-black relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="#"
                        class="text-2xl font-extrabold text-blue-500 tracking-widest hover:text-indigo-400 transition-colors duration-300 drop-shadow-md">
                        DISSENT
                    </a>
                </div>
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('products.index') }}"
                        class="{{ request()->routeIs('products.index') ? 'text-blue-500 border-b-4 border-indigo-500' : 'text-gray-300 hover:text-blue-400' }} px-3 py-2 rounded-t-md text-sm font-medium">
                        Produk
                    </a>
                    <a href="{{ route('category.index') }}"
                        class="{{ request()->routeIs('category.index') ? 'text-blue-500 border-b-4 border-indigo-500' : 'text-gray-300 hover:text-blue-400' }} px-3 py-2 rounded-t-md text-sm font-medium">
                        Kategori
                    </a>
                    <a href="{{ route('inventoryLog.index') }}"
                        class="{{ request()->routeIs('inventoryLog.index') ? 'text-blue-500 border-b-4 border-indigo-500' : 'text-gray-300 hover:text-blue-400' }} px-3 py-2 rounded-t-md text-sm font-medium">
                        Log Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="glow-bar"></div>
</nav>

<style>
    .glow-bar {
        position: absolute;
        bottom: -5px;
        left: 0;
        right: 0;
        height: 8px;
        background: linear-gradient(90deg, rgba(255, 0, 0, 0.8), rgba(0, 255, 0, 0.8), rgba(0, 0, 255, 0.8));
        filter: blur(6px);
        animation: glowAnimation 5s linear infinite;
    }

    nav a:hover {
        text-shadow: 0px 0px 8px rgba(255, 255, 255, 0.8);
        transition: text-shadow 0.3s;
    }

    @keyframes glowAnimation {
        0% { transform: translateX(-50%); }
        100% { transform: translateX(50%); }
    }
</style>
