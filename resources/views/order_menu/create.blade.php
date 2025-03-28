<!-- resources/views/order_menu/create.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Tambah Menu ke Pesanan</h1>
    <form action="{{ route('order_menu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="order_id">Pesanan</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}">{{ $order->invoice->invoice_number }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="menu_id">Menu</label>
            <select name="menu_id" id="menu_id" class="form-control" required>
                @foreach ($menus as $menu)
                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="quantity">Jumlah</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Tambah ke Pesanan</button>
    </form>
@endsection
