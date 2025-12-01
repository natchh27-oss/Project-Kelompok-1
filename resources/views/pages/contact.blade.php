@extends('layouts.app')

@section('title', 'Contact - Ploutos Coffee')

@section('content')

<section class="stainless-section min-h-screen w-full pt-40 pb-32 relative">
    <div class="absolute inset-0 bg-black/30 backdrop-blur-sm z-0"></div>

    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-12 relative z-10">

        <div class="lg:col-span-2 bg-white/15 backdrop-blur-2xl border border-white/30 rounded-2xl p-12
                    shadow-[0_0_40px_rgba(255,255,255,0.18)] transition duration-500 hover:bg-white/20">

            <div class="text-center">
                <h1 class="text-3xl md:text-4xl font-season tracking-wide text-white
                            drop-shadow-[0_2px_6px_rgba(0,0,0,0.7)]">
                    Kontak Ploutos Coffee
                </h1>
                <p class="mt-3 text-grey-200 text-sm font-light">
                    Hubungi kami untuk pertanyaan, kritik, atau informasi lainnya.
                </p>
            </div>

            <form action="{{ route('contact.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-7 mt-12">
                @csrf

                <div>
                    <label class="label-stainless text-white">Nama Lengkap</label>
                    <input type="text" name="name" class="input-stainless text-black" required>
                </div>

                <div>
                    <label class="label-stainless text-white">Email</label>
                    <input type="email" name="email" class="input-stainless text-black" required>
                </div>

                <div class="md:col-span-2">
                    <label class="label-stainless text-white">Nomor Telepon</label>
                    <input type="text" name="phone" class="input-stainless text-black" required>
                </div>

                <div class="md:col-span-2">
                    <label class="label-stainless text-white">Pesan</label>
                    <textarea name="message" rows="4" class="input-stainless text-black" required></textarea>
                </div>

                <div class="md:col-span-2">
                    <button type="submit"
                        class="btn-reservasi w-full py-3 font-semibold text-white rounded-xl overflow-hidden relative">
                        Kirim Pesan
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-black/50 backdrop-blur-2xl border border-white/20 rounded-2xl p-10
                    shadow-[0_0_35px_rgba(0,0,0,0.7)] transition duration-500 hover:bg-black/60">

            <h3 class="text-2xl font-season tracking-wide text-white text-center
                        drop-shadow-[0_3px_4px_rgba(0,0,0,0.8)]">
                Lokasi & Informasi
            </h3>

            <div class="mt-6 text-gray-200 space-y-3 text-center">
                <p class="text-lg font-medium">Ploutos Coffee</p>
                <p class="text-sm">Jl. A. Yani No.68I, RT.03/RW.03, Tanah Sareal, Kota Bogor, Jawa Barat 16161</p>
                <p class="text-sm">Telp: 0838-1366-7269</p>
                <p class="text-sm">Email: ploutos@gmail.com</p>
            </div>

            <div class="mt-10 text-gray-200 space-y-1 text-center">
                <p class="text-lg font-medium">Jam Operasional</p>
                <p class="text-sm">Minggu - Kamis: 07.00 - 23.00 WIB</p>
                <p class="text-sm">Jum'at - Sabtu: 07.00 - 00.00 WIB</p>
            </div>

            <div class="mt-10 rounded-xl overflow-hidden shadow-lg border border-white/10">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3550497544072!2d106.80240067486994!3d-6.572230364225984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c561189e8737%3A0x6a6e35285f81ff56!2sPLOUTOS!5e0!3m2!1sid!2sid!4v1732717612340!5m2!1sid!2sid"
                    width="100%"
                    height="250"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </div>
</section>

@endsection
