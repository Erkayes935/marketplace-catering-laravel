<!-- resources/views/menus/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Edit Menu</h1>
    <form action="{{ route('menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Menu</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menu->name) }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $menu->description) }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $menu->price) }}" required>
        </div>
        <div class="form-group">
            <label for="category_id">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $menu->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
@endsection
