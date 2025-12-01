@extends('layouts.admin')

@section('title', 'Messages')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-semibold text-gray-800">Messages & Contacts</h1>
</div>

{{-- Komentar User --}}
<div class="overflow-x-auto bg-white shadow-lg rounded-xl mb-10">
    <h2 class="text-xl font-semibold p-4 border-b border-gray-200">Komentar User</h2>
    <table class="min-w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 text-gray-700 text-sm">
                <th class="py-3 px-4 font-semibold">#</th>
                <th class="py-3 px-4 font-semibold">Nama User</th>
                <th class="py-3 px-4 font-semibold">Komentar</th>
                <th class="py-3 px-4 font-semibold text-center">Tanggal</th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($comments as $comment)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-medium">{{ $comment->user->name ?? 'Guest' }}</td>
                <td class="py-3 px-4">{{ $comment->content }}</td>
                <td class="py-3 px-4 text-center">{{ $comment->created_at->format('d M Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Pesan Kontak --}}
<div class="overflow-x-auto bg-white shadow-lg rounded-xl">
    <h2 class="text-xl font-semibold p-4 border-b border-gray-200">Pesan Kontak</h2>
    <table class="min-w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-100 text-gray-700 text-sm">
                <th class="py-3 px-4 font-semibold">#</th>
                <th class="py-3 px-4 font-semibold">Nama</th>
                <th class="py-3 px-4 font-semibold">Email</th>
                <th class="py-3 px-4 font-semibold">Telepon</th>
                <th class="py-3 px-4 font-semibold">Pesan</th>
                <th class="py-3 px-4 font-semibold text-center">Tanggal</th>
                <th class="py-3 px-4 font-semibold text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-800 text-sm">
            @foreach ($contacts as $contact)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="py-3 px-4">{{ $loop->iteration }}</td>
                <td class="py-3 px-4 font-medium">{{ $contact->name }}</td>
                <td class="py-3 px-4">{{ $contact->email }}</td>
                <td class="py-3 px-4">{{ $contact->phone }}</td>
                <td class="py-3 px-4">{{ $contact->message }}</td>
                <td class="py-3 px-4 text-center">{{ $contact->created_at->format('d M Y H:i') }}</td>
                <td class="py-3 px-4 text-center flex justify-center gap-2">
                    <a href="https://wa.me/{{ $contact->phone }}?text=Halo%20{{ urlencode($contact->name) }}%2C%20terima%20kasih%20atas%20pesan%20Anda."
                       target="_blank"
                       class="px-3 py-1.5 bg-green-500 hover:bg-green-600 text-white text-xs rounded-md shadow">
                        WA
                    </a>
                    <form action="{{ route('admin.contact.destroy', $contact->id ?? 0) }}" method="POST"
                          onsubmit="return confirm('Hapus pesan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1.5 bg-red-500 hover:bg-red-600 text-white text-xs rounded-md shadow">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
