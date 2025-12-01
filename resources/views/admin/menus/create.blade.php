@extends('layouts.admin')

@section('title', 'Tambah Menu')

@section('content')
<h1 class="text-2xl font-bold mb-6">Tambah Menu</h1>

<form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label class="block mb-2">Nama Menu</label>
    <input type="text" name="name" class="border w-full p-2 mb-4" placeholder="Masukkan nama menu" required>

    <label class="block mb-2">Kategori</label>
    <select name="category_id" class="border w-full p-2 mb-4" required>
        <option value="" selected disabled>Pilih kategori</option>
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
        @endforeach
    </select>

    <label class="block mb-2">Harga</label>
    <input type="number" name="price" class="border w-full p-2 mb-4" placeholder="Contoh: 15000" required>

    <label class="block mb-2">Deskripsi</label>
    <textarea name="description" class="border w-full p-2 mb-4" placeholder="Tulis deskripsi menu..."></textarea>

    <label class="block mb-2">Upload Gambar</label>
    <input type="file" name="image" class="border w-full p-2 mb-4">

    <label class="flex items-center">
        <input type="checkbox" name="is_signature" class="mr-2">
        Jadikan Signature Menu ⭐
    </label>

    <button class="px-4 py-2 mt-4 bg-green-600 text-white rounded">Simpan</button>
</form>
@endsection
