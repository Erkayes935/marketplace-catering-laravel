<!-- resources/views/menus/destroy.blade.php -->
@extends('layouts.app')
@section('content')
    <h1>Hapus Menu</h1>
    <p>Anda yakin ingin menghapus menu "{{ $menu->name }}"?</p>
    <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endsection
