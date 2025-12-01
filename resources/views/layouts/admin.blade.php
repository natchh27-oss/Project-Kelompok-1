<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('admin.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.25s;
            color: #cbd5e1;
        }
        .sidebar-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(4px);
        }
    </style>
</head>

<body class="flex h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-gray-900 text-gray-200 shadow-xl flex flex-col">
        <div class="p-4 font-bold text-xl border-b border-gray-800 flex items-center gap-2">
            <x-heroicon-o-cube class="w-6 h-6 text-blue-400" />
            Admin Panel
        </div>

        <nav class="flex-1 mt-2">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-chart-bar class="w-5 h-5" />
                        Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.menus.index') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-clipboard-document-list class="w-5 h-5" />
                        Menu
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.reservations.index') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-calendar-days class="w-5 h-5" />
                        Reservasi
                        @if($pendingCount > 0)
                            <span class="ml-auto bg-red-500 text-white rounded-full px-2 text-xs">{{ $pendingCount }}</span>
                        @endif
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.messages') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-chat-bubble-left-right class="w-5 h-5" />
                        Komentar & Pesan
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.events.index') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-sparkles class="w-5 h-5" />
                        Event
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.settings.profile') }}" class="sidebar-link flex items-center gap-2">
                        <x-heroicon-o-cog-6-tooth class="w-5 h-5" />
                        Pengaturan
                    </a>
                </li>
            </ul>
        </nav>

        <div class="p-4 border-t border-gray-800 text-sm text-gray-500">
            © {{ date('Y') }} Ploutos Coffee
        </div>
    </aside>

    <div class="flex-1 flex flex-col">

        <header class="bg-white shadow-md p-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-700">
                @yield('title', 'Admin Dashboard')
            </h1>

            <div class="flex items-center gap-3">
                <span class="text-gray-600 flex items-center gap-1">
                    <x-heroicon-o-hand-thumb-up class="w-5 h-5 text-gray-500" />
                    Halo, Admin
                </span>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="button"
                        onclick="document.getElementById('logout-form').submit();"
                        class="px-3 py-1 rounded-md text-sm bg-red-500 hover:bg-red-600 text-white transition flex items-center gap-1">
                        <x-heroicon-o-arrow-right-start-on-rectangle class="w-5 h-5" />
                        Logout
                    </button>
                </form>
            </div>
        </header>

        <main class="p-6 flex-1 overflow-auto bg-gray-100">
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>
