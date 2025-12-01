@extends('layouts.app')

@section('title', 'Edit Profil — Ploutos Coffee')

@section('content')

<section class="relative w-full min-h-screen bg-cover bg-center stainless-bg-fixed pt-28 pb-20"
         style="background-image: url('{{ asset('assets/images/texture8.jpg') }}');">

    <div class="absolute inset-0 stainless-overlay backdrop-blur-[2px]"></div>

    <div class="relative max-w-2xl mx-auto px-6">

        <div class="bg-white/10 backdrop-blur-xl border border-white/20 rounded-3xl shadow-xl p-8 animate-fade-up">

            <h1 class="text-3xl font-bold text-white mb-6 text-center">Edit Profil</h1>

            @if (session('success'))
            <div class="mb-4 p-3 rounded-lg bg-green-500/30 border border-green-400 text-green-100">
                {{ session('success') }}
            </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex flex-col items-center mb-6">
                    <div class="w-28 h-28 rounded-full overflow-hidden border border-white/30 shadow">
                        <img id="previewPhoto"
                             src="{{ $user->profile_photo
                                    ? asset('storage/' . $user->profile_photo)
                                    : 'https://ui-avatars.com/api/?name=' . $user->name }}"
                             class="w-full h-full object-cover">
                    </div>

                    <label class="mt-3 text-white font-semibold cursor-pointer">
                        <input type="file" name="photo" id="photoInput" class="hidden" accept="image/*">
                        <span class="px-4 py-2 bg-white/20 hover:bg-white/30 border border-white/30 rounded-lg">
                            Ganti Foto
                        </span>
                    </label>

                    @error('photo')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NAME --}}
                <div class="mb-5">
                    <label class="text-white font-semibold">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full mt-2 p-3 rounded-lg bg-white/10 border border-white/20 text-white
                               placeholder-gray-300 focus:border-white/40">
                    @error('name')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-5">
                    <label class="text-white font-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full mt-2 p-3 rounded-lg bg-white/10 border border-white/20 text-white
                               placeholder-gray-300 focus:border-white/40">
                    @error('email')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- BUTTONS --}}
                <div class="flex gap-4 mt-8">
                    <a href="{{ route('profile.index') }}"
                        class="w-1/2 text-center py-3 rounded-xl bg-white/20 hover:bg-white/30
                               border border-white/30 text-white font-semibold transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="w-1/2 py-3 rounded-xl bg-green-500/80 hover:bg-green-600
                               text-white font-semibold transition">
                        Simpan Perubahan
                    </button>
                </div>

            </form>

        </div>

    </div>
</section>

{{-- PREVIEW IMAGE SCRIPT --}}
<script>
document.getElementById('photoInput').addEventListener('change', function (event) {
    const reader = new FileReader();
    reader.onload = function () {
        document.getElementById('previewPhoto').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});
</script>

@endsection
