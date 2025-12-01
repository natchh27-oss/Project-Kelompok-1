@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
<div class="stainless-section min-h-screen w-full pt-24 px-6">
    <h1 class="text-3xl font-season mb-8 text-white drop-shadow">Edit Event</h1>

    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="label-stainless">Judul Event</label>
            <input type="text" name="title" value="{{ old('title', $event->title) }}" class="input-stainless" required>
        </div>

        <div class="mb-4">
            <label class="label-stainless">Tanggal Event</label>
            <input type="date" name="date" value="{{ old('date', $event->date) }}" class="input-stainless">
        </div>

        <div class="mb-4">
            <label class="label-stainless">Deskripsi</label>
            <textarea name="description" rows="4" class="input-stainless">{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="label-stainless">Gambar</label>
            <input type="file" name="image" class="input-stainless">
            @if($event->image)
                <img src="{{ asset('storage/' . $event->image) }}" class="w-32 h-20 object-cover mt-2 rounded">
            @endif
        </div>

        <button type="submit" class="btn-reservasi w-full py-3 font-semibold text-white rounded-xl">
            Update Event
        </button>
    </form>
</div>
@endsection
