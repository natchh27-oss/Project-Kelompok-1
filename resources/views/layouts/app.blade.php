<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ploutos Coffee</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/safira-march" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/the-seasons" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>

    <nav id="navbar" class="text-white shadow-lg transition-all duration-500 py-4 relative z-50">
        <div class="container mx-auto flex justify-between items-center px-6">

            <div class="flex items-center gap-3" data-aos="fade-down" data-aos-duration="700">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-10 w-auto drop-shadow-md">
                <h1 class="text-xl font-semibold tracking-wide">Ploutos Coffee</h1>
            </div>

            <ul class="desktop-menu hidden md:flex gap-6 font-medium" data-aos="fade-down" data-aos-delay="200">
                <li><a href="/" class="nav-link">Home</a></li>
                <li><a href="/menu" class="nav-link">Menu</a></li>
                <li><a href="/#about" class="nav-link">About</a></li>
                <li><a href="/#gallery" class="nav-link">Gallery</a></li>
                <li><a href="/contact" class="nav-link">Contact</a></li>
                <li><a href="/reservasi" class="nav-link">Reservasi</a></li>
            </ul>

            <div class="hidden md:flex items-center gap-3" data-aos="fade-down" data-aos-delay="400">
                @auth
                    <div class="relative group">
                        <a href="{{ route('profile.index') }}" class="block">
                            @if(Auth::user()->profile_photo)
                                <button class="w-10 h-10 rounded-full overflow-hidden border-2 border-white/70 shadow-md">
                                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                        alt="{{ Auth::user()->name }}"
                                        class="w-full h-full object-cover">
                                </button>
                            @else
                                <div class="w-10 h-10 rounded-full flex items-center justify-center bg-gray-300 text-black font-semibold text-sm border-2 border-white/70 shadow-md">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </a>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-login">Login</a>
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                @endauth
            </div>

            <button id="menu-btn" class="mobile-menu text-2xl focus:outline-none md:hidden">
                <i class="fas fa-bars"></i>
            </button>

        </div>

        <div id="mobile-menu" class="hidden flex flex-col items-center gap-3 pb-4 bg-white/10 backdrop-blur-md
                        text-white animate__animated animate__fadeInDown md:hidden">
            <a href="/" class="nav-link">Home</a>
            <a href="/menu" class="nav-link">Menu</a>
            <a href="/#about" class="nav-link">About</a>
            <a href="/#gallery" class="nav-link">Gallery</a>
            <a href="/contact" class="nav-link">Contact</a>
            <a href="/reservasi" class="nav-link">Reservasi</a>

            @guest
                <a href="{{ route('login') }}" class="btn-login w-[80%] text-center">Login</a>
                <a href="{{ route('register') }}" class="btn-register w-[80%] text-center">Register</a>
            @endguest
        </div>
    </nav>


    <main class="min-h-screen text-center flex flex-col justify-center items-center">
        @yield('content')
    </main>


    <footer>
        <div class="footer-container ">
            <div>
                <img src="{{ asset('assets/images/logo.png') }}" class="footer-logo" alt="Logo">
                <h3 class="font-semibold text-lg">Ploutos Coffee</h3>
                <p>Suasana hangat, aroma khas, dan rasa tak terlupakan. Nikmati kopi terbaik dalam sentuhan elegan stainless.</p>
            </div>

            <div>
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/menu">Menu</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>

            <div>
                <h4>Contact Us</h4>
                <p>📍 Jl. A. Yani No. 681</p>
                <p>📞 0838-1366-7269</p>
                <p>✉️ ploutos@gmail.com</p>
            </div>

            <div>
                <h4>Follow Us</h4>
                <div class="flex gap-4 text-xl">
                    <a href="#"><i class="fab fa-instagram hover:text-gray-700"></i></a>
                    <a href="#"><i class="fab fa-facebook hover:text-gray-700"></i></a>
                    <a href="#"><i class="fab fa-twitter hover:text-gray-700"></i></a>
                    <a href="#"><i class="fab fa-tiktok hover:text-gray-700"></i></a>
                </div>
            </div>
        </div>
        <p class="copyright">
            © {{ date('Y') }} Ploutos Coffee — Crafted with stainless elegance.
        </p>
    </footer>

    <script src="{{asset('assets/js/component.js')}}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();

        const navbar = document.getElementById('navbar');
        let lastScrollY = window.scrollY;

        window.addEventListener('scroll', () => {
            const currentScroll = window.scrollY;

            // Sticky + shrink effect
            if (currentScroll > 50) {
                navbar.classList.add('scrolled', 'shrink');
            } else {
                navbar.classList.remove('scrolled', 'shrink');
            }

            // Hide when scrolling down, show when scrolling up
            if (currentScroll > lastScrollY) {
                navbar.classList.add('hidden-up');
            } else {
                navbar.classList.remove('hidden-up');
            }

            lastScrollY = currentScroll;
        });

        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
