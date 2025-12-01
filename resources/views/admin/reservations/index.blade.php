@extends('layouts.admin')

@section('title', 'Daftar Reservasi')

@section('content')

<div class="stainless-section min-h-screen w-full pt-24 px-6">
    <h1 class="text-3xl md:text-4xl font-season mb-8 text-black">
        Daftar Reservasi
    </h1>

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-6 shadow-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-2xl shadow-lg">
        <table class="min-w-full bg-white/10 border border-white/20 text-black">
            <thead class="bg-white/20">
                <tr>
                    <th class="px-4 py-3 text-left">Nama</th>
                    <th class="px-4 py-3 text-left">Telepon</th>
                    <th class="px-4 py-3 text-left">Tanggal</th>
                    <th class="px-4 py-3 text-left">Jam</th>
                    <th class="px-4 py-3 text-left">Orang</th>
                    <th class="px-4 py-3 text-left">Lokasi</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reservations as $res)
                    <tr class="border-b border-white/10 hover:bg-white/10 transition">
                        <td class="px-4 py-3">{{ $res->name }}</td>
                        <td class="px-4 py-3">{{ $res->phone }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($res->date)->format('d M Y') }}</td>
                        <td class="px-4 py-3">{{ \Carbon\Carbon::parse($res->time)->format('H:i') }}</td>
                        <td class="px-4 py-3">{{ $res->people }}</td>
                        <td class="px-4 py-3">{{ $res->table_location }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                @if($res->status=='Pending') bg-yellow-500
                                @elseif($res->status=='Confirmed') bg-green-500
                                @else bg-red-500
                                @endif">
                                {{ $res->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.reservations.status', $res) }}" method="POST" class="flex gap-2 items-center">
                                @csrf
                                <select name="status" class="bg-white text-black rounded-md px-2 py-1 text-sm">
                                    <option value="Pending" @if($res->status=='Pending') selected @endif>Pending</option>
                                    <option value="Confirmed" @if($res->status=='Confirmed') selected @endif>Confirmed</option>
                                    <option value="Cancelled" @if($res->status=='Cancelled') selected @endif>Cancelled</option>
                                </select>
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md text-sm transition">
                                    Update
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-300">Belum ada reservasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
