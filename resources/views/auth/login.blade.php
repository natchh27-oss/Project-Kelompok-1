<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Ploutos Coffee</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-stainless relative">
    <a href="/"
        class="absolute top-6 left-6 px-4 py-2 rounded-xl bg-white/40 backdrop-blur-md
                border border-white/50 text-black text-sm font-medium hover:bg-[#e0c89d]
                hover:text-black transition shadow-md">
            ← Kembali ke Home
        </a>
    <div id="authCard"
        class="relative z-10 w-[92%] max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2
        rounded-2xl overflow-hidden shadow-2xl transition-all duration-700 glass-card">

        <div id="loginForm"
            class="p-10 md:p-14 fade-up flex flex-col justify-center transition-all duration-700">

            <div class="text-center mb-8">
                <img src="/assets/images/logo.png" class="w-20 mx-auto mb-3">
                <h2 class="text-3xl font-semibold text-black">Ploutos Coffee</h2>
                <p class="text-black/70 text-sm">Elegant • Stainless • Modern</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-400 text-red-700 text-sm backdrop-blur-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-400 text-green-800 text-sm backdrop-blur-md">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label class="text-black text-sm mb-1 block">Email</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-envelope class="w-5 h-5" />
                        </span>
                        <input type="email" name="email"
                            class="glass-input"
                            placeholder="Email" required>
                    </div>
                </div>

                <div>
                    <label class="text-black text-sm mb-1 block">Password</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-lock-closed class="w-5 h-5" />
                        </span>

                        <input type="password" id="passwordField" name="password"
                            class="glass-input pr-11"
                            placeholder="Kata sandi" required>

                        <button type="button" onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-black/70 hover:text-[#e0c89d] transition">
                            <x-heroicon-o-eye class="w-5 h-5" id="eyeOpen" />
                            <x-heroicon-o-eye-slash class="w-5 h-5 hidden" id="eyeClose" />
                        </button>
                    </div>
                </div>

                <div class="text-right -mt-3">
                    <a href="{{ route('password.request') }}"
                       class="text-sm link-gold hover:underline">
                        Lupa password?
                    </a>
                </div>

                <button class="btn-gold w-full py-3">
                    Login
                </button>

                <p class="text-center text-black text-sm">
                    Belum punya akun?
                    <a href="#" class="link-gold" onclick="animateToRegister(event)">
                        Daftar di sini
                    </a>
                </p>
            </form>
        </div>

        <div id="imageWrapper"
            class="relative h-[300px] md:h-full fade-slide image-right transition-all duration-700">
            <img src="/assets/images/banner.jpg"
                class="w-full h-full object-cover transition-all duration-700"
                id="authImage">
        </div>
    </div>

    <script src="{{ asset('assets/js/component.js') }}"></script>
</body>
</html>
