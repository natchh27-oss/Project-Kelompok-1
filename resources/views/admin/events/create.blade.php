@extends('layouts.admin')

@section('title', 'Tambah Event')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Event</h1>

<form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label class="block mb-2">Judul Event</label>
    <input type="text" name="title" value="{{ old('title') }}" class="border w-full p-2 mb-4" placeholder="Masukkan judul event" required>

    <label class="block mb-2">Tanggal Event</label>
    <input type="date" name="date" value="{{ old('date') }}" class="border w-full p-2 mb-4">

    <label class="block mb-2">Deskripsi</label>
    <textarea name="description" class="border w-full p-2 mb-4" placeholder="Deskripsi event">{{ old('description') }}</textarea>

    <label class="block mb-2">Gambar</label>
    <input type="file" name="image" class="border w-full p-2 mb-4">

    <button class="px-4 py-2 bg-green-600 text-white rounded">Simpan Event</button>
</form>
@endsection
