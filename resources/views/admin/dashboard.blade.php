@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="stainless-section min-h-screen w-full pt-24 px-6">

    <h1 class="text-4xl font-season mb-8 text-black drop-shadow">Dashboard Admin</h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Total Menu</h2>
            <p class="text-3xl font-bold">{{ \App\Models\Menu::count() }}</p>
        </div>

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Reservasi Pending</h2>
            <p class="text-3xl font-bold">{{ \App\Models\Reservation::where('status','Pending')->count() }}</p>
        </div>

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Event Aktif</h2>
            <p class="text-3xl font-bold">{{ \App\Models\Event::count() }}</p>
        </div>

        <a href="{{ route('admin.account') }}">
            <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition cursor-pointer">
                <h2 class="text-xl font-semibold mb-2">Total Akun</h2>
                <p class="text-3xl font-bold">{{ \App\Models\User::count() }}</p>
            </div>
        </a>


    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Reservasi Hari Ini</h2>
            <p class="text-2xl font-bold">{{ \App\Models\Reservation::whereDate('date', now())->count() }}</p>
        </div>

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Reservasi Minggu Ini</h2>
            <p class="text-2xl font-bold">{{ \App\Models\Reservation::whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</p>
        </div>

        <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow hover:scale-105 transform transition">
            <h2 class="text-xl font-semibold mb-2">Reservasi Bulan Ini</h2>
            <p class="text-2xl font-bold">{{ \App\Models\Reservation::whereMonth('date', now()->month)->count() }}</p>
        </div>

    </div>

    <div class="bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl p-6 text-black shadow">
        <h2 class="text-2xl font-semibold mb-4">Komentar & Feedback</h2>
        <p>Gunakan menu komentar untuk meninjau feedback user.</p>
    </div>

</div>
@endsection
