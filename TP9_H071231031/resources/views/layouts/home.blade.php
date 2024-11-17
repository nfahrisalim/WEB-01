<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home - Dissent</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-slate-900 text-gray-300 font-sans antialiased">
    <!-- Navbar -->
    @include('partials.navbar')

    <div class="container mx-auto px-4 py-10">
        <div class="content mx-auto text-center max-w-4xl bg-slate-800/50 p-8 rounded-lg shadow-lg border border-blue-500">
            @include('components.message')
            @yield('content')
        </div>
    </div>

    @include('partials.footer')

    <style>
        .content {
            background: rgba(15, 23, 42, 0.9); 
            border: 1px solid rgba(0, 122, 255, 0.6); 
            box-shadow: 0px 4px 12px rgba(0, 122, 255, 0.2); 
            padding: 2rem;
            border-radius: 8px; 
        }
        a {
            color: #7eb1ff;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        a:hover {
            color: #a0cfff;
            text-shadow: 0px 0px 4px rgba(0, 122, 255, 0.8);
        }
    </style>
</body>
</html>
