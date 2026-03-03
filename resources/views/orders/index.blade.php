<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Pesanan</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">Buat Pesanan</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Tanggal Antar</th>
                <th>Jumlah Item</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                @php
                    $totalHarga = $order->menus->sum(fn($menu) => (float) $menu->price * (int) ($menu->pivot->quantity ?? 1));
                    $jumlahItem = $order->menus->sum(fn($menu) => (int) ($menu->pivot->quantity ?? 1));
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>{{ $order->delivery_date }}</td>
                    <td>{{ $jumlahItem }}</td>
                    <td>Rp {{ number_format($totalHarga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
