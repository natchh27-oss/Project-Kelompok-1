@extends('layouts.admin')

@section('title', 'Ubah Password')

@section('content')
<div class="p-8">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Pengaturan Akun</h1>

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

    @if ($errors->any())
        <div class="mb-6 p-4 rounded-md bg-red-100 text-red-700 text-sm border border-red-200">
            <ul class="list-disc ml-4">
                @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white p-8 rounded-xl shadow-md border border-gray-200 max-w-xl">

        <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="text-gray-700 text-sm mb-1 block">Password Lama</label>
                <input type="password" name="current_password"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-1 block">Password Baru</label>
                <input type="password" name="new_password"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            <div>
                <label class="text-gray-700 text-sm mb-1 block">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation"
                       class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                       required>
            </div>

            <button class="px-6 py-3 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700 transition w-full">
                Perbarui Password
            </button>

        </form>

    </div>

</div>
@endsection
