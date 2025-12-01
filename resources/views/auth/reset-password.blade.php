<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - Ploutos Coffee</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-stainless relative">

    <div id="authCard"
        class="relative z-10 w-[92%] max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2
        rounded-2xl overflow-hidden shadow-2xl transition-all duration-700 glass-card">

        {{-- LEFT FORM --}}
        <div class="p-10 md:p-14 fade-up flex flex-col justify-center transition-all duration-700">

            <div class="text-center mb-8">
                <img src="/assets/images/logo.png" class="w-20 mx-auto mb-3">
                <h2 class="text-3xl font-semibold text-black">Reset Password</h2>
                <p class="text-black/70 text-sm">Masukkan password baru Anda.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-400 text-red-700 text-sm backdrop-blur-md">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                {{-- EMAIL --}}
                <div>
                    <label class="text-black text-sm mb-1 block">Email</label>

                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-envelope class="w-5 h-5" />
                        </span>

                        <input type="email"
                               name="email"
                               class="glass-input"
                               placeholder="Email Anda"
                               required
                               value="{{ request('email') }}">
                    </div>
                </div>

                {{-- NEW PASSWORD --}}
                <div>
                    <label class="text-black text-sm mb-1 block">Password Baru</label>
                    <input type="password"
                           name="password"
                           class="glass-input"
                           placeholder="Password baru"
                           required>
                </div>

                {{-- CONFIRM --}}
                <div>
                    <label class="text-black text-sm mb-1 block">Konfirmasi Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="glass-input"
                           placeholder="Konfirmasi password"
                           required>
                </div>

                <button class="btn-gold w-full py-3">
                    Reset Password
                </button>

            </form>
        </div>

        {{-- RIGHT IMAGE --}}
        <div class="relative h-[300px] md:h-full fade-slide image-right transition-all duration-700">
            <img src="/assets/images/banner.jpg"
                 class="w-full h-full object-cover transition-all duration-700">
        </div>

    </div>

    <script src="{{asset('assets/js/component.js')}}"></script>
</body>
</html>
