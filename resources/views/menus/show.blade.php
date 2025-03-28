<!-- resources/views/menus/show.blade.php -->
@extends('layouts.app')

@section('content')

    <h1>Show Menu</h1>
    <p>Nama Menu: {{ $menu->name }}</p>
    <p>Harga: Rp {{ number_format($menu->price) }}</p>
    <p>Kategori: {{ $menu->category->name }}</p>
    <a href="{{ route('menus.index') }}" class="btn btn-secondary mt-3">Back</a>
    <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning mt-3">Edit</a>
    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Hapus</button>
    </form>
@endsection
