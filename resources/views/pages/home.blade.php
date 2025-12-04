@extends('layouts.app')

@section('title', 'Home - Ploutos Coffee')

@section('content')

<section
    class="relative w-full h-[100vh] flex items-center justify-center bg-center bg-cover overflow-hidden stainless-bg-fixed"
    style="background-image: url('{{ asset('assets/images/banner1.jpg') }}');">

    <div class="relative z-10 text-center text-white px-6 max-w-5xl translate-y-12"
         data-aos="fade-up" data-aos-duration="1200">

        <h2 class="text-4xl md:text-6xl font-['The_Seasons'] mb-4 drop-shadow-xl">
            Experience Calm & Coffee in
        </h2>

        <h3 class="text-5xl md:text-7xl font-['Safira_March'] text-transparent bg-clip-text
                   bg-gradient-to-r from-[#F7E7C3] via-[#FFFFFF] to-[#B7B7B7]
                   drop-shadow-[0_2px_8px_rgba(255,255,255,0.2)] mb-6">
            Stainless Serenity
        </h3>

        <p class="text-base md:text-lg text-gray-200 mb-10 leading-relaxed max-w-2xl mx-auto">
            Rasakan ketenangan di setiap tegukan kopi kami — harmoni antara cita rasa, desain, dan suasana elegan Ploutos Coffee.
        </p>

        <div class="flex justify-center gap-4 flex-wrap">
            <a href="/menu"
                class="px-8 py-3 rounded-full text-black bg-gradient-to-r from-white/80 to-white/60
                       backdrop-blur shadow hover:shadow-xl transition">
                Explore Menu
            </a>

            <a href="/reservasi"
                class="px-8 py-3 rounded-full text-white border border-white/50
                       hover:bg-white hover:text-black transition">
                Book a Table
            </a>
        </div>
    </div>
</section>

<div class="stainless-section min-h-screen w-full pt-40 pb-32 relative">

    <div class="absolute inset-0 stainless-overlay backdrop-blur-md"></div>

    <section id="about" class="fade-section relative w-full py-32 text-white z-10">
        <div class="relative w-full max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-16 px-6 md:px-10">

            <div class="md:w-1/2">
                <h2 class="text-5xl md:text-6xl font-['The_Seasons'] font-bold mb-8 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)]">
                    Our Story
                </h2>

                <p class="text-lg leading-relaxed drop-shadow-[0_2px_6px_rgba(0,0,0,0.6)]">
                    Ploutos Coffee menghadirkan harmoni antara desain modern stainless
                    dan rasa kopi yang elegan, memberikan pengalaman yang menenangkan dalam setiap tegukannya.
                </p>
            </div>

            <div class="md:w-1/2 relative group">
                <div class="rounded-2xl overflow-hidden shadow-2xl relative">
                    <img src="{{ asset('assets/images/story.jpg') }}"
                         class="w-full object-cover transition duration-[2500ms] group-hover:scale-110 group-hover:rotate-[3deg] filter blur-[0.5px]">

                    <div class="absolute bottom-0 left-0 w-full h-32 overflow-hidden">
                        <img src="{{ asset('assets/images/story.jpg') }}"
                             class="w-full object-cover transform scale-y-[-1] opacity-20 blur-sm">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    </div>

                    <div class="absolute inset-0 bg-[url('/assets/images/stain.png')] bg-cover bg-center opacity-20 pointer-events-none"></div>
                </div>
            </div>
        </div>
    </section>

    <section id="signature" class="fade-section relative w-full py-32 text-white z-10">
        <div class="relative max-w-7xl mx-auto px-6 md:px-10 text-center">

            <h2 class="text-5xl md:text-6xl font-['The_Seasons'] font-bold mb-2 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)]">
                Signature Menu
            </h2>
            <p class="text-gray-100 text-lg mb-14 drop-shadow-[0_2px_6px_rgba(0,0,0,0.6)]">
                Menu eksklusif pilihan barista kami untuk pengalaman rasa terbaik.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-10">

                @foreach ($signatureMenus as $menu)
                    <a href="{{ route('menu.show', urlencode($menu->name)) }}" class="stainless-card shadow-2xl group relative overflow-hidden block">
                        <img
                            src="{{ $menu->image ? asset('uploads/menu/'.$menu->image) : 'https://via.placeholder.com/150' }}"
                            class="h-48 w-full object-cover transition duration-[1800ms] group-hover:scale-110 group-hover:rotate-[2deg] filter blur-[0.5px]">

                        <div class="absolute bottom-0 left-0 w-full h-16 overflow-hidden">
                            <img src="{{ $menu->image ? asset('uploads/menu/'.$menu->image) : 'https://via.placeholder.com/150' }}"
                                class="w-full object-cover transform scale-y-[-1] opacity-20 blur-sm">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                        </div>

                        <div class="absolute inset-0 bg-[url('/assets/images/stain.png')] bg-cover bg-center opacity-20 pointer-events-none"></div>

                        <div class="p-6 text-left text-white relative z-10">
                            <h3 class="text-2xl font-bold drop-shadow">{{ $menu->name }}</h3>
                            <p class="mt-3 font-bold text-xl text-white drop-shadow">
                                Rp {{ number_format($menu->price,0,',','.') }}
                            </p>
                        </div>
                    </a>
                    @endforeach
            </div>

            <a href="/menu"
               class="mt-16 inline-block px-8 py-4 bg-white/80 text-white rounded-xl bg-gradient-to-br from-[#b28b39] via-[#e0c67c] to-[#b28b39]
                    shadow-lg hover:brightness-110 transition">
                Lihat Semua Menu →
            </a>
        </div>
    </section>

    <section id="event" class="fade-section relative w-full py-32 text-white z-10">
        <div class="relative w-full max-w-7xl mx-auto text-center px-6">
            <h2 class="text-4xl md:text-5xl font-['The_Seasons'] mb-6 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)]">Event & Promo</h2>
            <p class="text-lg text-gray-100 max-w-3xl mx-auto mb-16 drop-shadow-[0_2px_6px_rgba(0,0,0,0.6)]">
                Nikmati event dan promo eksklusif kami setiap bulannya.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
                @foreach ($events as $event)
                <div class="stainless-card p-0 group relative overflow-hidden">
                    <img src="{{ $event->image ? asset('storage/'.$event->image) : '/assets/manual/default-event.jpg' }}"
                         class="w-full h-48 object-cover group-hover:scale-110 transition duration-700 filter blur-[0.5px]">

                    <div class="absolute bottom-0 left-0 w-full h-16 overflow-hidden">
                        <img src="{{ $event->image ? asset('storage/'.$event->image) : '/assets/manual/default-event.jpg' }}"
                             class="w-full object-cover transform scale-y-[-1] opacity-20 blur-sm">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    </div>

                    <div class="absolute inset-0 bg-[url('/assets/images/stain.png')] bg-cover bg-center opacity-20 pointer-events-none"></div>

                    <div class="p-6 text-left relative z-10">
                        <h3 class="text-xl font-semibold mb-2">{{ $event->title }}</h3>
                        <p class="text-sm opacity-80">{{ $event->description }}</p>
                    </div>
                </div>
                @endforeach

                <div class="stainless-card p-6 flex flex-col justify-between">
                    <img src="/assets/manual/loyalty.jpg" class="w-full h-40 object-cover rounded-lg mb-4">
                    <h3 class="text-2xl font-semibold mb-3 text-left">Loyalty Card Member</h3>
                    <p class="text-sm text-left opacity-90 mb-4">Kumpulkan stamp dan dapatkan reward khusus.</p>
                    <a href="/loyalty" class="mt-auto py-2 px-4 bg-white/80 text-black rounded-full hover:bg-white transition"> Learn More </a>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="fade-section relative w-full py-32 text-white z-10">
        <div class="relative max-w-7xl mx-auto px-6 md:px-10 text-center">

            <h2 class="text-5xl md:text-6xl font-['The_Seasons'] font-bold mb-4 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)]">
                Gallery
            </h2>

            <p class="text-gray-100 text-lg mb-14 drop-shadow max-w-2xl mx-auto">
                Suasana elegan, desain premium, dan momen hangat di Ploutos Coffee.
            </p>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 md:gap-6">
                @foreach ([1,2,3,4,5,6,7,8] as $g)
                <div class="stainless-card rounded-2xl group p-0 relative overflow-hidden">
                    <img src="/assets/images/gallery{{ $g }}.jpg"
                         class="w-full h-40 sm:h-48 md:h-56 object-cover transition duration-[1500ms] group-hover:scale-110 group-hover:rotate-[2deg] filter blur-[0.5px]">

                    <div class="absolute bottom-0 left-0 w-full h-16 overflow-hidden">
                        <img src="/assets/images/gallery{{ $g }}.jpg"
                             class="w-full object-cover transform scale-y-[-1] opacity-20 blur-sm">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimonial" class="fade-section relative w-full py-32 text-white z-10">
        <div class="relative w-full max-w-7xl mx-auto text-center px-6">
            <h2 class="text-4xl md:text-5xl font-['The_Seasons'] mb-6 drop-shadow-[0_4px_8px_rgba(0,0,0,0.7)]">What Our Customers Say</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($comments as $comment)
                    <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl p-6 shadow-xl animate-fade-up">

                        <div class="flex items-center gap-4 mb-4">

                            @if($comment->user->profile_photo)
                                <img src="{{ asset('storage/' . $comment->user->profile_photo) }}"
                                    class="w-12 h-12 rounded-full object-cover border border-white/30 shadow">
                            @else
                                <div class="w-12 h-12 rounded-full bg-white/20 flex items-center justify-center
                                            text-xl font-bold border border-white/30 text-white shadow">
                                    {{ strtoupper($comment->user->name[0]) }}
                                </div>
                            @endif

                            <div class="text-left">
                                <h3 class="font-semibold text-white text-lg">
                                    {{ $comment->user->name }}
                                </h3>
                                <span class="text-gray-300 text-xs">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>

                        </div>

                        <p class="text-gray-100 text-sm leading-relaxed">
                            {{ $comment->comment }}
                        </p>

                        @if($comment->media)
                            <div class="mt-3">
                                @if(Str::endsWith($comment->media, ['jpg','jpeg','png','webp']))
                                    <img src="{{ asset('storage/' . $comment->media) }}"
                                        class="rounded-xl w-full border border-white/20 shadow">
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
    </section>
</div>
@endsection
