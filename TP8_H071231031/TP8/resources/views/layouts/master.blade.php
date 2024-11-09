<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iphone | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        *::selection {
            background-color: #007aff; /* iPhone blue accent color */
            color: white;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "San Francisco", Helvetica, Arial, sans-serif;
            background-color: #f4f4f5; /* Light, soft gray typical of iPhone settings pages */
            color: #1c1c1e; /* Darker text, consistent with iOS's appearance */
        }

        .container {
            max-width: 1000px; 
        }

        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
            color: #1c1c1e; 
        }

        a {
            color: #007aff; 
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
    @include('partials.navbar')
    <!-- Content -->
    <main class="container mx-auto py-6 px-4">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>
