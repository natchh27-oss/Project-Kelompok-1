@extends('layouts.admin')

@section('title', 'Daftar Event')

@section('content')
<div class="stainless-section min-h-screen w-full pt-24 px-6">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold text-gray-800">Daftar Event</h1>

        <a href="{{ route('admin.events.create') }}"
           class="inline-block mb-4 px-6 py-2 bg-gradient-to-r from-blue-500 to-indigo-600
                  text-white font-semibold rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-700
                  transition transform hover:-translate-y-0.5">
            + Tambah Event
        </a>
    </div>

    <div class="overflow-x-auto bg-white shadow-lg rounded-xl">
        <table class="min-w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-sm">
                    <th class="py-3 px-4 font-semibold">#</th>
                    <th class="py-3 px-4 font-semibold">Judul</th>
                    <th class="py-3 px-4 font-semibold">Tanggal</th>
                    <th class="py-3 px-4 font-semibold">Gambar</th>
                    <th class="py-3 px-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="text-gray-800 text-sm">
                @foreach($events as $event)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4 font-medium">{{ $event->title }}</td>
                    <td class="py-3 px-4">{{ $event->date ? \Carbon\Carbon::parse($event->date)->format('d M Y') : '-' }}</td>
                    <td class="py-3 px-4">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" alt="" class="w-24 h-16 object-cover rounded">
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center flex gap-2 justify-center">
                        <a href="{{ route('admin.events.edit', $event->id) }}"
                           class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs rounded-md shadow">
                            Edit
                        </a>

                        <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                              onsubmit="return confirm('Hapus event ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs rounded-md shadow">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
