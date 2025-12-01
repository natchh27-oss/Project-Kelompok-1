@extends('layouts.app')

@section('title', $menu->name . ' - Ploutos Coffee')

@section('content')
<section class="relative w-full min-h-screen bg-cover bg-center pt-32 pb-20 stainless-bg-fixed" style="background-image: url('{{ asset('assets/images/texture8.jpg') }}');">
    <div class="absolute inset-0 stainless-overlay backdrop-blur-md"></div>
    <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-10">

        <div class="text-white opacity-0 animate-fade-up mb-10">
            <h1 class="text-4xl font-extrabold drop-shadow-lg">{{ $menu->name }}</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 opacity-0 animate-fade-up">
            <div class="rounded-2xl overflow-hidden shadow-2xl border border-white/30">
                <img src="{{ asset('uploads/menu/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
            </div>

            <div class="bg-white/20 backdrop-blur-2xl border border-white/30 rounded-2xl shadow-xl p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white drop-shadow-lg mb-2">{{ $menu->name }}</h2>
                    <p class="text-xl text-white/90 mb-4 drop-shadow-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                    <p class="text-white/80 mb-6">{{ $menu->description ?? 'Deskripsi menu belum tersedia.' }}</p>
                </div>

                <div class="mt-6 border-t border-white/20 pt-4 flex flex-col gap-4">
                    <form id="favorite-form" action="{{ route('menu.favorite', $menu->id) }}" method="POST" class="self-start">
                        @csrf
                        <button type="submit" class="flex items-center gap-2 px-6 py-3 rounded-xl {{ auth()->user() && auth()->user()->favoriteMenus->contains($menu->id) ? 'bg-yellow-500' : 'bg-gray-500/60' }} hover:bg-yellow-600 text-white font-semibold transition shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            <span>Favorit</span>
                        </button>
                    </form>

                    <div>
                        <h4 class="text-white font-bold mb-2">Bagikan Menu:</h4>
                        <div class="flex gap-3">
                            @php
                                $url = urlencode(url()->current());
                                $text = urlencode("Lihat menu {$menu->name} di Ploutos Coffee!");
                            @endphp

                            <a href="https://wa.me/?text={{ $text }}%20{{ $url }}" target="_blank" class="px-3 py-2 bg-green-500 text-white rounded-xl shadow hover:bg-green-600 transition flex items-center justify-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="h-6 w-6" alt="WhatsApp">
                            </a>

                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $url }}" target="_blank" class="px-3 py-2 bg-blue-600 text-white rounded-xl shadow hover:bg-blue-700 transition flex items-center justify-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" class="h-6 w-6" alt="Facebook">
                            </a>

                            <a href="https://www.instagram.com/" target="_blank" class="px-3 py-2 bg-pink-500 text-white rounded-xl shadow hover:bg-pink-600 transition flex items-center justify-center">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" class="h-6 w-6" alt="Instagram">
                            </a>

                            <a href="https://www.tiktok.com/" target="_blank" class="px-3 py-2 bg-white rounded-xl shadow hover:bg-gray-800 transition flex items-center justify-center">
                                <img src="https://upload.wikimedia.org/wikipedia/en/a/a9/TikTok_logo.svg" class="h-12 w-8" alt="TikTok">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-16 opacity-0 animate-fade-up">
            <h3 class="text-white text-2xl font-bold mb-6">Komentar</h3>
            <form action="{{ route('comments.store') }}" method="POST" class="flex flex-col gap-4 mb-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="menu_id" value="{{ $menu->id }}">
                <textarea name="comment" rows="4" class="w-full p-4 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 text-white placeholder-white/70" placeholder="Tulis komentar kamu..."></textarea>
                <input type="file" name="media" class="text-white text-sm">
                <button type="submit" class="self-end px-6 py-3 rounded-xl bg-gradient-to-br from-[#b28b39] via-[#e0c67c] to-[#b28b39] text-white font-semibold shadow hover:brightness-110 transition">
                    Kirim Komentar
                </button>
            </form>

            <div class="space-y-4">
                @forelse($menu->comments ?? [] as $comment)
                    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl p-4 shadow-md max-w-md animate-fade-up">
                        <div class="flex items-center gap-3 mb-3">
                            @if($comment->user->profile_photo)
                                <img src="{{ asset('storage/' . $comment->user->profile_photo) }}" class="w-10 h-10 rounded-full object-cover border border-white/30 shadow">
                            @else
                                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-lg font-bold border border-white/30 text-white shadow">
                                    {{ strtoupper($comment->user->name[0] ?? 'A') }}
                                </div>
                            @endif
                            <div class="text-left">
                                <h3 class="font-semibold text-white text-base">{{ $comment->user->name ?? 'Anonim' }}</h3>
                                <span class="text-gray-300 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="text-gray-100 text-xs leading-relaxed">{{ $comment->comment }}</p>
                        @if($comment->media)
                            <div class="mt-2">
                                @if(Str::endsWith($comment->media, ['jpg','jpeg','png','webp']))
                                    <img src="{{ asset('storage/' . $comment->media) }}" class="rounded-xl w-full border border-white/20 shadow">
                                @else
                                    <video controls class="rounded-xl w-full border border-white/20 shadow">
                                        <source src="{{ asset('storage/' . $comment->media) }}">
                                    </video>
                                @endif
                            </div>
                        @endif
                    </div>
                @empty
                    <p class="text-gray-300">Belum ada komentar.</p>
                @endforelse
            </div>
        </div>

      
    </div>

    <div id="favorite-bubble" class="fixed bottom-5 right-5 bg-yellow-500 text-white px-4 py-2 rounded-full shadow-lg z-50 opacity-100 transition-all duration-500"></div>
</section>

<script>
document.getElementById('favorite-form').addEventListener('submit', function(e){
    e.preventDefault();
    const form = this;
    const url = form.action;
    const token = form.querySelector('input[name="_token"]').value;

    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': token,
            'Accept': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        const button = form.querySelector('button');
        if(data.status === 'added'){
            button.classList.remove('bg-gray-500/60');
            button.classList.add('bg-yellow-500');
        } else {
            button.classList.remove('bg-yellow-500');
            button.classList.add('bg-gray-500/60');
        }

        const bubble = document.getElementById('favorite-bubble');
        bubble.textContent = data.status === 'added' ? 'Menu telah ditambahkan ke favorit!' : 'Menu telah dihapus dari favorit!';
        bubble.classList.remove('opacity-0');
        bubble.classList.add('opacity-100');
        setTimeout(() => {
            bubble.classList.remove('opacity-100');
            bubble.classList.add('opacity-0');
        }, 3000);
    })
    .catch(err => console.error(err));
});
</script>
@endsection
