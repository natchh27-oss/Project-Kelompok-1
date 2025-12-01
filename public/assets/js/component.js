function togglePassword() {
    const input = document.getElementById("passwordField");
    const open = document.getElementById("eyeOpen");
    const close = document.getElementById("eyeClose");

            if (input.type === "password") {
                input.type = "text";
                open.classList.add("hidden");
                close.classList.remove("hidden");
            } else {
                input.type = "password";
                close.classList.add("hidden");
                open.classList.remove("hidden");
            }
        }

        /* ANIMASI PINDAH GAMBAR KE KIRI LALU REDIRECT */
        function animateToRegister(event) {
            event.preventDefault(); // cegah langsung pindah halaman

            const wrapper = document.getElementById("imageWrapper");
            const img = document.getElementById("authImage");

            // 1. Gambar slide ke kiri + fade
            wrapper.classList.add("slide-to-left");

            // 2. Setelah 600ms ganti posisi jadi kiri + gambar baru
            setTimeout(() => {
                wrapper.classList.remove("image-right");
                wrapper.classList.add("image-left");

                img.src = "/assets/images/cafe2.jpg";
                img.classList.add("slide-from-right");
            }, 650);

            // 3. Setelah animasi selesai → pindah halaman register
            setTimeout(() => {
                window.location.href = "/register";
            }, 1200);
        }

function animateToRegister(e) {
            e.preventDefault();

            const card = document.getElementById('authCard');
            const login = document.getElementById('loginForm');
            const image = document.getElementById('imageWrapper');

            card.classList.add('switch-card');
            image.classList.add('fade-out');
            login.classList.add('slide-left');

            setTimeout(() => {
                window.location.href = "/register";
            }, 600);
        }

 function animateBack(e) {
            e.preventDefault();

            const card = document.getElementById('authCard');
            const form = document.getElementById('registerForm');
            const image = document.getElementById('imageWrapper');

            card.classList.add('switch-card');
            form.classList.add('slide-left');
            image.classList.add('fade-out');

            setTimeout(() => {
                window.location.href = "/login";
            }, 600);
        }


window.addEventListener("scroll", () => {
    const bg = document.querySelector(".stainless-global");
    if(bg){
        const speed = 0.18; // (semakin kecil semakin elegan)
        bg.style.backgroundPositionY = `-${window.pageYOffset * speed}px`;
    }
});
