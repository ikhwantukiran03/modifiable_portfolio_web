<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio Website')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-white min-h-screen flex flex-col">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">Portfolio</a>

                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-indigo-600 transition">Home</a>
                    <a href="{{ route('about.index') }}" class="text-gray-700 hover:text-indigo-600 transition">About</a>
                    <a href="{{ route('portfolio.index') }}" class="text-gray-700 hover:text-indigo-600 transition">Portfolio</a>
                    <a href="{{ route('certificate.index') }}" class="text-gray-700 hover:text-indigo-600 transition">Certificates</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-indigo-600 transition">Contact</a>

                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-700 hover:text-indigo-600 transition">Logout</button>
                        </form>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="block md:hidden">
                    <button id="menu-toggle" class="text-gray-600 focus:outline-none">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden mt-4 pb-4 hidden">
                <a href="{{ route('home') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Home</a>
                <a href="{{ route('about.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">About</a>
                <a href="{{ route('portfolio.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Portfolio</a>
                <a href="{{ route('certificate.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Certificates</a>
                <a href="{{ route('contact.index') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Contact</a>
                
                @auth 
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="py-2 text-gray-700 hover:text-indigo-600 transition">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p>&copy; 2025 Portfolio. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>

    @yield('scripts')
</body>
</html>