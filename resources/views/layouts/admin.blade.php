<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Portfolio Website')</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @yield('styles')
</head>
<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="bg-indigo-800 text-white w-64 min-h-screen p-4 hidden md:block">
        <div class="mb-8">
            <h1 class="text-2xl font-bold">Admin Panel</h1>
        </div>
        
        <nav>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                        <i class="fas fa-home mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('about.edit', 1) }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                        <i class="fas fa-user mr-3"></i>
                        <span>About Me</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('portfolio.index') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                        <i class="fas fa-briefcase mr-3"></i>
                        <span>Portfolio</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('certificate.index') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                        <i class="fas fa-certificate mr-3"></i>
                        <span>Certificates</span>
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('contact.edit', 1) }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                        <i class="fas fa-envelope mr-3"></i>
                        <span>Contact Info</span>
                    </a>
                </li>
                <li class="mt-8">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center p-2 rounded hover:bg-indigo-700 transition w-full">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </aside>

    <div class="flex-1 flex flex-col">
        <!-- Mobile header -->
        <header class="bg-white shadow-md p-4 md:hidden">
            <div class="flex items-center justify-between">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <button id="sidebar-toggle" class="text-gray-600 focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </header>

        <!-- Mobile sidebar -->
        <div id="mobile-sidebar" class="fixed inset-0 z-20 bg-gray-900 bg-opacity-50 md:hidden hidden">
            <div class="bg-indigo-800 text-white w-64 min-h-screen p-4">
                <div class="flex justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">Admin Panel</h1>
                    <button id="sidebar-close" class="text-white focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <nav>
                    <ul>
                        <li class="mb-4">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                                <i class="fas fa-home mr-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('about.edit', 1) }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                                <i class="fas fa-user mr-3"></i>
                                <span>About Me</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('portfolio.index') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                                <i class="fas fa-briefcase mr-3"></i>
                                <span>Portfolio</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('certificate.index') }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                                <i class="fas fa-certificate mr-3"></i>
                                <span>Certificates</span>
                            </a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('contact.edit', 1) }}" class="flex items-center p-2 rounded hover:bg-indigo-700 transition">
                                <i class="fas fa-envelope mr-3"></i>
                                <span>Contact Info</span>
                            </a>
                        </li>
                        <li class="mt-8">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center p-2 rounded hover:bg-indigo-700 transition w-full">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    <span>Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <main class="flex-1 p-6 overflow-auto">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 relative" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <script>
        // Mobile sidebar toggle
        document.getElementById('sidebar-toggle')?.addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.remove('hidden');
        });

        document.getElementById('sidebar-close')?.addEventListener('click', function() {
            document.getElementById('mobile-sidebar').classList.add('hidden');
        });
    </script>
    
    @yield('scripts')
</body>
</html>