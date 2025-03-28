<!-- resources/views/menus/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Menu</h1>
    <a href="{{ route('menus.create') }}" class="btn btn-primary">Tambah Menu</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $menu->name }}</td>
                    <td>Rp {{ number_format($menu->price) }}</td>
                    <td>{{ $menu->category->name }}</td>
                    <td>
                        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
