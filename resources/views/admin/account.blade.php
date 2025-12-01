@extends('layouts.admin')

@section('title', 'Daftar User')

@section('content')
<div class="p-8">
    <h1 class="text-3xl font-semibold mb-6 text-black">Daftar User</h1>
    <p class="mb-4 font-semibold text-lg">Total User: {{ $totalUsers }}</p>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white/10 backdrop-blur-2xl border border-white/30 rounded-2xl text-black">
            <thead>
                <tr class="text-left border-b border-white/20">
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Dibuat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-white/10 hover:bg-white/10 transition">
                    <td class="px-4 py-3">{{ $user->name }}</td>
                    <td class="px-4 py-3">{{ $user->email }}</td>
                    <td class="px-4 py-3">
                        <span class="inline-block px-2 py-1 text-sm rounded {{ $user->role === 'admin' ? 'bg-blue-500 text-white' : 'bg-green-500 text-white' }}">
                            {{  ucfirst($user->role) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
