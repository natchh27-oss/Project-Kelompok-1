<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - Ploutos Coffee</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-stainless relative">

    <div id="authCard"
        class="relative z-10 w-[92%] max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2
        rounded-2xl overflow-hidden shadow-2xl transition-all duration-700 glass-card">

        <div class="p-10 md:p-14 fade-up flex flex-col justify-center transition-all duration-700">

            <div class="text-center mb-8">
                <img src="/assets/images/logo.png" class="w-20 mx-auto mb-3">
                <h2 class="text-3xl font-semibold text-black">Lupa Password</h2>
                <p class="text-black/70 text-sm">Masukkan email Anda untuk reset password.</p>
            </div>

            {{-- SUCCESS --}}
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-green-500/20 border border-green-400 text-green-700 text-sm backdrop-blur-md">
                    {{ session('status') }}
                </div>
            @endif

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-500/20 border border-red-400 text-red-700 text-sm backdrop-blur-md">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

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
                               required>
                    </div>
                </div>

                <button class="btn-gold w-full py-3">
                    Kirim Link Reset
                </button>

                <p class="text-center text-black text-sm">
                    <a href="{{ route('login') }}" class="link-gold">Kembali ke Login</a>
                </p>
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
