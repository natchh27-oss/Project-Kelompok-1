<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Ploutos Coffee</title>
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-stainless relative">

    <div id="authCard"
        class="relative z-10 w-[92%] max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2
        rounded-2xl overflow-hidden shadow-2xl transition-all duration-700 glass-card">

        <div id="registerForm"
             class="p-10 md:p-14 fade-up flex flex-col justify-center transition-all duration-700">

            <div class="text-center mb-8">
                <img src="/assets/images/logo.png" class="w-20 mx-auto mb-3">
                <h2 class="text-3xl font-semibold text-black">Daftar Akun Baru</h2>
                <p class="text-black/70 text-sm">Aesthetic • Modern • Stainless</p>
            </div>

            <form method="POST" action="/register" class="space-y-6">
                @csrf

                <div>
                    <label class="text-black text-sm mb-1 block">Username</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-user class="w-5 h-5" />
                        </span>

                        <input type="text" name="name"
                            class="glass-input"
                            placeholder="Username">
                    </div>
                </div>

                <div>
                    <label class="text-black text-sm mb-1 block">Email</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-envelope class="w-5 h-5" />
                        </span>
                        <input type="email" name="email"
                            class="glass-input"
                            placeholder="Email">
                    </div>
                </div>

                <div>
                    <label class="text-black text-sm mb-1 block">Password</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-lock-closed class="w-5 h-5" />
                        </span>

                        <input type="password" id="passwordReg" name="password"
                            class="glass-input pr-11"
                            placeholder="Kata sandi">

                        <button type="button" onclick="togglePasswordReg()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-black/70 hover:text-[#e0c89d] transition">
                            <x-heroicon-o-eye class="w-5 h-5" id="eyeOpenReg" />
                            <x-heroicon-o-eye-slash class="w-5 h-5 hidden" id="eyeCloseReg" />
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-black text-sm mb-1 block">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-black/70">
                            <x-heroicon-o-lock-closed class="w-5 h-5" />
                        </span>

                        <input type="password" id="confirmReg" name="password_confirmation"
                            class="glass-input pr-11"
                            placeholder="Konfirmasi ulang">

                        <button type="button" onclick="toggleConfirmReg()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-black/70 hover:text-[#e0c89d] transition">
                            <x-heroicon-o-eye class="w-5 h-5" id="eyeOpenConfirm" />
                            <x-heroicon-o-eye-slash class="w-5 h-5 hidden" id="eyeCloseConfirm" />
                        </button>

                    </div>
                </div>

                <button class="btn-gold w-full py-3">
                    Daftar Sekarang
                </button>

                <p class="text-center text-black text-sm">
                    Sudah punya akun?
                    <a href="#" onclick="animateBack(event)" class="link-gold">
                        Login di sini
                    </a>
                </p>
            </form>

        </div>

        <div id="imageWrapper"
            class="relative h-[300px] md:h-full fade-slide transition-all duration-700">
            <img src="/assets/images/banner.jpg"
                class="w-full h-full object-cover transition-all duration-700"
                id="authImage">
        </div>
    </div>

    <script>
        function togglePasswordReg() {
        const field = document.getElementById("passwordReg");
        const eyeOpen = document.getElementById("eyeOpenReg");
        const eyeClose = document.getElementById("eyeCloseReg");

        if (field.type === "password") {
            field.type = "text";
            eyeOpen.classList.add("hidden");
            eyeClose.classList.remove("hidden");
        } else {
            field.type = "password";
            eyeOpen.classList.remove("hidden");
            eyeClose.classList.add("hidden");
        }
    }

        function toggleConfirmReg() {
            const field = document.getElementById("confirmReg");
            const eyeOpen = document.getElementById("eyeOpenConfirm");
            const eyeClose = document.getElementById("eyeCloseConfirm");

            if (field.type === "password") {
                field.type = "text";
                eyeOpen.classList.add("hidden");
                eyeClose.classList.remove("hidden");
            } else {
                field.type = "password";
                eyeOpen.classList.remove("hidden");
                eyeClose.classList.add("hidden");
            }
        }
    </script>


    <script src="{{asset('assets/js/component.js')}}"></script>
</body>
</html>
