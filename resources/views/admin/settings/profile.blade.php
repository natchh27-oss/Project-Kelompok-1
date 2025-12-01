@extends('layouts.admin')

@section('title', 'Pengaturan Profil')

@section('content')
<div class="p-8">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Pengaturan Profil</h1>

    {{-- Navigasi Profile & Password --}}
    <div class="mb-6 flex gap-4">
        <a href="{{ route('admin.settings.profile') }}"
           class="px-4 py-2 rounded-md font-semibold
           {{ request()->routeIs('admin.settings.profile') ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 border border-blue-200 hover:bg-blue-50' }}">
            Profile
        </a>
        <a href="{{ route('admin.settings.password') }}"
           class="px-4 py-2 rounded-md font-semibold
           {{ request()->routeIs('admin.settings.password') ? 'bg-blue-600 text-white' : 'bg-white text-blue-600 border border-blue-200 hover:bg-blue-50' }}">
            Ubah Password
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 rounded-md bg-green-100 text-green-800 text-sm border border-green-200">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-200 max-w-xl">

        <form action="{{ route('admin.profile.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="text-gray-700 text-sm mb-1 block">Nama</label>
                <input type="text" name="name"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                       value="{{ old('name', auth()->user()->name) }}" required>
                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-1 block">Email</label>
                <input type="email" name="email"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                       value="{{ old('email', auth()->user()->email) }}" required>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button class="px-6 py-3 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700 transition w-full">
                Simpan Perubahan
            </button>

        </form>

    </div>

</div>
@endsection
