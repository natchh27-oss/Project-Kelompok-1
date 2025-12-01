@extends('layouts.app')

@section('title', 'Reservasi - Ploutos Coffee')

@section('content')

<section class="stainless-section min-h-screen w-full pt-40 pb-32">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm z-0""></div>

    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-12">

        <div class="lg:col-span-2 bg-white/15 backdrop-blur-2xl border border-white/30 rounded-2xl p-12
            shadow-[0_0_40px_rgba(255,255,255,0.18)] transition duration-500 hover:bg-white/20">

            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-season tracking-wide text-white
                    drop-shadow-[0_2px_6px_rgba(0,0,0,0.7)]">
                    Reservasi Ploutos Coffee
                </h1>
                <p class="mt-3 text-grey-200 text-sm font-light">
                    Pesan tempat untuk momen istimewamu
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-500 text-white p-4 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('reservasi.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-7 mt-12">
                @csrf

                <div>
                    <label class="label-stainless text-white">Nama Lengkap</label>
                    <input type="text" name="name" class="input-stainless" required>
                </div>

                <div>
                    <label class="label-stainless text-white">Nomor Telepon</label>
                    <input type="text" name="phone" class="input-stainless" required>
                </div>

                <div>
                    <label class="label-stainless text-white">Tanggal Reservasi</label>
                    <input type="date" name="date" class="input-stainless" required>
                </div>

                <div>
                    <label class="label-stainless text-white">Jam Reservasi</label>
                    <input type="time" name="time" class="input-stainless" required>
                </div>

                <div>
                    <label class="label-stainless text-white">Jumlah Orang</label>
                    <input type="number" name="people" min="1" value="1" class="input-stainless" required>
                </div>

                 <div class="md:col-span-2">
                    <label class="label-stainless text-white">Lokasi Meja</label>

                    <div class="flex items-center gap-10 mt-1 text-black">

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="table_location" value="Indoor" required
                                class="w-4 h-4 accent-black">
                            <span class="text-white">Indoor</span>
                        </label>

                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="table_location" value="Outdoor" required
                                class="w-4 h-4 accent-black">
                            <span class="text-white">Outdoor</span>
                        </label>

                    </div>
                </div>

                <div class="md:col-span-2">
                    <label class="label-stainless text-white">Catatan</label>
                    <textarea name="notes" rows="3" class="input-stainless"></textarea>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="btn-reservasi w-full py-3 font-semibold text-white rounded-xl overflow-hidden relative">
                        Pesan Reservasi Sekarang
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-black/50 backdrop-blur-2xl border border-white/20 rounded-2xl p-10
            shadow-[0_0_35px_rgba(0,0,0,0.7)] text-center transition duration-500 hover:bg-black/60">

            <h3 class="text-2xl font-season tracking-wide text-white drop-shadow-[0_3px_4px_rgba(0,0,0,0.8)]">
                Jam Operasional
            </h3>

            <div class="mt-8 text-gray-200 space-y-1">
                <p class="text-lg font-medium">Minggu - Kamis</p>
                <p class="text-xl tracking-wide font-light">07.00 - 23.00 WIB</p>
                <p class="text-lg font-medium">Jum'at - Sabtu</p>
                <p class="text-xl tracking-wide font-light">07.00 - 00.00 WIB</p>
            </div>

            <div class="mt-10 text-gray-300 text-sm leading-relaxed px-2">
                Reservasi dapat dilakukan max
                <strong class="text-peace-light">1 hari sebelumnya</strong>
                untuk menjamin ketersediaan tempat.
            </div>
        </div>

    </div>
</section>

@endsection
