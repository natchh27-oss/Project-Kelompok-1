@extends('layouts.admin')

@section('title', 'Ubah Password')

@section('content')
<div class="p-8">

    <h1 class="text-3xl font-semibold mb-6 text-gray-800">Pengaturan Akun</h1>

    {{-- Navigasi --}}
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

            {{-- Password Lama --}}
            <div>
                <label class="text-gray-700 text-sm mb-1 block">Password Lama</label>
                <div class="relative">
                    <input type="password" name="current_password" id="currentPassword"
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                           required>

                    <button type="button" onclick="togglePassword('currentPassword', 'iconOld')"
                            class="absolute right-3 top-3 text-gray-600 hover:text-gray-800">
                        {{-- Eye Icon --}}
                        <svg id="iconOld" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12
                                    4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0
                                    .639C20.577 16.49 16.64 19.5 12
                                    19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Password Baru --}}
            <div>
                <label class="text-gray-700 text-sm mb-1 block">Password Baru</label>
                <div class="relative">
                    <input type="password" name="new_password" id="newPassword"
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                           required>

                    <button type="button" onclick="togglePassword('newPassword', 'iconNew')"
                            class="absolute right-3 top-3 text-gray-600 hover:text-gray-800">
                        <svg id="iconNew" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12
                                    4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0
                                    .639C20.577 16.49 16.64 19.5 12
                                    19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="text-gray-700 text-sm mb-1 block">Konfirmasi Password Baru</label>
                <div class="relative">
                    <input type="password" name="new_password_confirmation" id="confirmPassword"
                           class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-blue-400"
                           required>

                    <button type="button" onclick="togglePassword('confirmPassword', 'iconConfirm')"
                            class="absolute right-3 top-3 text-gray-600 hover:text-gray-800">
                        <svg id="iconConfirm" xmlns="http://www.w3.org/2000/svg"
                             fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             class="w-6 h-6 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12
                                    4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0
                                    .639C20.577 16.49 16.64 19.5 12
                                    19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            <button class="px-6 py-3 rounded-md bg-blue-600 text-white font-semibold hover:bg-blue-700 transition w-full">
                Perbarui Password
            </button>

        </form>

    </div>

</div>

{{-- Script Heroicon Toggle --}}
<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        const eyeIcon = `
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12
                4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0
                .639C20.577 16.49 16.64 19.5 12
                19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        `;

        const eyeSlashIcon = `
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226
                16.338 7.244 19.5 12 19.5c1.838 0 3.582-.46
                5.102-1.276M6.228 6.228A10.45 10.45 0 0112
                4.5c4.756 0 8.773 3.162 10.065 7.5a10.523
                10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228
                3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0
                0a3 3 0 10-4.243-4.243m4.243 4.243L9.88 9.88"/>
        `;

        if (input.type === "password") {
            input.type = "text";
            icon.innerHTML = eyeSlashIcon;
        } else {
            input.type = "password";
            icon.innerHTML = eyeIcon;
        }
    }
</script>

@endsection
