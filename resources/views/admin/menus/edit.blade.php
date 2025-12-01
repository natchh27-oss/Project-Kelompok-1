@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit Menu</h1>

<form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <label class="block mb-2">Nama Menu</label>
    <input type="text" name="name" value="{{ $menu->name }}" class="border w-full p-2 mb-4">

    <label class="block mb-2">Kategori</label>
    <select name="category_id" class="border w-full p-2 mb-4">
        @foreach($categories as $cat)
        <option value="{{ $cat->id }}" @selected($menu->category_id == $cat->id)>
            {{ $cat->name }}
        </option>
        @endforeach
    </select>

    <label class="block mb-2">Harga</label>
    <input type="number" name="price" value="{{ $menu->price }}" class="border w-full p-2 mb-4">

    <label class="block mb-2">Deskripsi</label>
    <textarea name="description" class="border w-full p-2 mb-4">{{ $menu->description }}</textarea>

    <label class="block mb-2">Gambar Lama</label>
    @if($menu->image)
        <img src="{{ asset('storage/menu/' . $menu->image) }}" class="w-32 mb-4">
    @endif

    <label class="block mb-2">Gambar Baru</label>
    <input type="file" name="image" class="border w-full p-2 mb-4">

    <label class="flex items-center">
    <input type="checkbox" name="is_signature" class="mr-2" {{ isset($menu) && $menu->is_signature ? 'checked' : '' }}>
    Jadikan Signature Menu ⭐
    </label>

    <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
</form>
@endsection
