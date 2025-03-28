<!-- resources/views/order_menu/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Menu dalam Pesanan</h1>
    <a href="{{ route('order_menu.create') }}" class="btn btn-primary">Tambah Menu ke Pesanan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderMenus as $orderMenu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $orderMenu->menu->name }}</td>
                    <td>Rp {{ number_format($orderMenu->menu->price) }}</td>
                    <td>{{ $orderMenu->quantity }}</td>
                    <td>Rp {{ number_format($orderMenu->total_price) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
