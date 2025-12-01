@extends('layouts.app')

@section('title', 'Menu - Ploutos Coffee')

@section('content')

<section class="relative w-full min-h-screen bg-cover bg-center pt-32 pb-20 stainless-bg-fixed"
         style="background-image: url('{{ asset('assets/images/texture8.jpg') }}');">

    <div class="absolute inset-0 stainless-overlay backdrop-blur-md"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 md:px-10">

        <div class="text-center mb-12 opacity-0 animate-fade-up">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-wide drop-shadow-lg">
                Ploutos Menu
            </h1>
            <p class="text-white/90 mt-2 text-lg">
                Nikmati cita rasa terbaik dari kami
            </p>
        </div>

        <div class="mt-10 flex flex-col md:flex-row gap-10">

            <div class="w-full md:w-1/4 bg-white/20 backdrop-blur-2xl
                        border border-white/40 shadow-2xl rounded-2xl p-6
                        animate-fade-up opacity-0
                        h-[420px] overflow-y-auto">

                <h4 class="font-bold text-xl text-white mb-4 pb-2 border-b border-white/40">
                    Kategori
                </h4>

                <ul class="space-y-2">

                    <a href="{{ route('menu') }}"
                       class="block py-2 px-3 rounded-lg font-medium transition-all duration-200 category-link
                              {{ request()->category == null ? 'category-active' : '' }}">
                        Semua Menu
                    </a>

                    @foreach ($categories as $cat)
                        <a href="{{ route('menu') }}?category={{ $cat->name }}"
                           class="block py-2 px-3 rounded-lg font-medium transition-all duration-200 category-link
                                  {{ request()->category == $cat->name ? 'category-active' : '' }}">
                            {{ $cat->name }}
                        </a>
                    @endforeach

                </ul>
            </div>

            <div class="w-full md:w-3/4 opacity-0 animate-fade-up">

                <form action="{{ route('menu') }}" method="GET" class="flex items-center mb-8">

                    <input
                        type="text"
                        name="search"
                        value="{{ request()->search }}"
                        placeholder="Search menu..."
                        class="w-full px-5 py-3 rounded-l-2xl
                        bg-gradient-to-r from-[#d5d3d3] to-[#e7e5e5]
                        text-gray-700 placeholder-gray-500
                        shadow-md outline-none border border-white/10 backdrop-blur-sm">

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-r-2xl font-semibold text-white
                        bg-gradient-to-br from-[#b28b39] via-[#e0c67c] to-[#b28b39]
                        shadow-lg hover:brightness-110 transition">
                        Search
                    </button>

                </form>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">

                    @foreach($menus as $m)
                        <a href="{{ route('menu.show', urlencode($m->name)) }}">
                            <div class="relative bg-white/20 backdrop-blur-xl rounded-2xl overflow-hidden
                                        shadow-xl border border-white/30 shine-card
                                        opacity-0 animate-fade-up hover:-translate-y-2
                                        hover:shadow-2xl transition-all duration-300">

                                <div class="shine-effect pointer-events-none"></div>

                                <img src="{{ asset('uploads/menu/'.$m->image) }}"
                                     class="w-full h-48 object-cover">

                                <div class="p-5">
                                    <h5 class="font-bold text-lg text-white tracking-wide">
                                        {{ $m->name }}
                                    </h5>

                                    <p class="text-white text-xl font-semibold mt-2 drop-shadow-lg">
                                        Rp {{ number_format($m->price, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>

            </div>

        </div>

    </div>
</section>

@endsection
