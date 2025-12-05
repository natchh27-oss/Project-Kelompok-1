{{-- resources/views/profile/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Saya — Ploutos Coffee')

@section('content')

<section class="relative w-full min-h-screen bg-cover bg-center stainless-bg-fixed pt-28 pb-20"
         style="background-image: url('{{ asset('assets/images/texture8.jpg') }}');">

    <div class="absolute inset-0 stainless-overlay backdrop-blur-[2px]"></div>

    <div class="relative max-w-5xl mx-auto px-6">

        {{-- Profil User --}}
        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-2xl p-8 animate-fade-up">

            <div class="flex items-center gap-6 mb-8">
                @if(Auth::user()->profile_photo)
                    <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                         class="w-20 h-20 rounded-full object-cover border border-white/30 shadow">
                @else
                    <div class="w-20 h-20 rounded-full bg-white/20 flex items-center justify-center
                                text-3xl font-bold border border-white/30 shadow">
                        {{ strtoupper(Auth::user()->name[0]) }}
                    </div>
                @endif

                <div>
                    <h1 class="text-3xl font-bold text-white tracking-wide">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-gray-200 text-sm">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-10">
                <a href="{{ route('profile.edit') }}"
                   class="block text-center py-3 rounded-xl bg-white/20 hover:bg-white/30
                          border border-white/30 text-white font-semibold transition">
                    Edit Profil
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-red-500/80 hover:bg-red-600 text-white font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        {{-- Komentar User --}}
        <div class="mt-12 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl">

            <h2 class="text-xl font-semibold text-white mb-4">Komentar Anda</h2>

            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="comment" rows="3"
                    class="w-full p-4 rounded-xl bg-white/20 border border-white/30 text-white
                           placeholder-white/70 focus:outline-none"
                    placeholder="Tulis komentar..."></textarea>

                <div class="flex items-center gap-3 mt-3">
                    <input type="file" name="media"
                           accept="image/*,video/*"
                           class="text-white text-sm">
                </div>

                <button
                    class="mt-3 px-5 py-2 rounded-xl bg-yellow-500/80 hover:bg-yellow-600
                           text-white font-semibold shadow transition">
                    Kirim Komentar
                </button>
            </form>

            <div class="mt-8 space-y-5">
                @foreach($user->comments as $comment)
                <div class="bg-white/10 border border-white/20 rounded-xl p-4 backdrop-blur-lg shadow">
                    <div class="flex items-start gap-3">
                        <div>
                            @if(Auth::user()->profile_photo)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}"
                                     class="w-10 h-10 rounded-full object-cover">
                            @else
                                <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center text-lg text-white">
                                    {{ strtoupper(Auth::user()->name[0]) }}
                                </div>
                            @endif
                        </div>

                        <div class="flex-1">
                            <div class="flex items-center justify-between">
                                <h4 class="text-white font-semibold">{{ Auth::user()->name }}</h4>
                                <span class="text-gray-300 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>

                            <p class="text-white mt-1">{{ $comment->comment }}</p>

                            @if($comment->media)
                                @if(Str::endsWith($comment->media, ['.jpg','.png','.jpeg','.webp']))
                                    <img src="{{ asset('storage/'.$comment->media) }}"
                                         class="mt-3 rounded-xl border border-white/20 w-56">
                                @else
                                    <video controls class="mt-3 rounded-xl border border-white/20 w-56">
                                        <source src="{{ asset('storage/'.$comment->media) }}">
                                    </video>
                                @endif
                            @endif

                            <div class="flex items-center gap-5 mt-2">
                                <button class="text-yellow-300 text-sm hover:text-yellow-500 reply-btn"
                                        data-id="{{ $comment->id }}">
                                    Balas
                                </button>

                                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-300 hover:text-red-500 text-sm font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </div>

                            <form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data"
                                class="reply-form mt-3 hidden">
                                @csrf
                                <input type="hidden" name="menu_id" value="{{ $menu->id ?? 1 }}"> <!-- pastikan menu_id valid -->
                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                <textarea name="comment" rows="2"
                                    class="w-full p-3 rounded-xl bg-white/10 border border-white/20 text-white text-sm"
                                    placeholder="Tulis balasan..."></textarea>

                                <input type="file" name="media" accept="image/*,video/*" class="text-white text-xs mt-2">

                                <button type="submit"
                                    class="mt-2 px-4 py-1 rounded-lg bg-blue-500/80 hover:bg-blue-600 text-white text-xs">
                                    Kirim Balasan
                                </button>
                            </form>


                            <div class="mt-4 space-y-3 ml-10 border-l border-white/20 pl-4">
                                @foreach($comment->replies as $reply)
                                    <div class="bg-white/10 p-3 rounded-xl border border-white/20">
                                        <p class="text-white text-sm">{{ $reply->reply }}</p>

                                        @if($reply->media)
                                            @if(Str::contains($reply->media, ['.jpg','.png','.jpeg','.webp']))
                                                <img src="{{ asset('storage/'.$reply->media) }}"
                                                     class="mt-2 rounded-lg border border-white/20 w-40">
                                            @else
                                                <video controls class="mt-2 rounded-lg border border-white/20 w-40">
                                                    <source src="{{ asset('storage/'.$reply->media) }}">
                                                </video>
                                            @endif
                                        @endif

                                        <span class="text-gray-300 text-xs block mt-1">
                                            {{ $reply->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Menu Favorit --}}
        <div class="mt-12 bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl">
            <h2 class="text-xl font-semibold text-white mb-4">Menu Favorit Anda</h2>

            @if($user->favoriteMenus->isEmpty())
                <p class="text-white/70">Anda belum menambahkan menu favorit.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($user->favoriteMenus as $menu)
                        <div class="relative bg-white/10 border border-white/20 rounded-xl overflow-hidden shadow hover:brightness-110 transition">
                            <a href="{{ route('menu.show', $menu->name) }}">
                                <img src="{{ asset('uploads/menu/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-40 object-cover">
                                <div class="p-3">
                                    <h3 class="text-white font-semibold">{{ $menu->name }}</h3>
                                    <p class="text-white/70">Rp {{ number_format($menu->price,0,',','.') }}</p>
                                </div>
                            </a>

                            <form action="{{ route('menu.favorite', $menu->id) }}" method="POST" class="absolute top-2 right-2">
                                @csrf
                                <button type="submit" class="px-2 py-1 rounded bg-red-500 hover:bg-red-600 text-white text-xs">
                                    Hapus ❤️
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
</section>

<script>
    document.querySelectorAll('.reply-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            let form = btn.parentElement.parentElement.querySelector('.reply-form');
            form.classList.toggle('hidden');
        });
    });
</script>

@endsection
