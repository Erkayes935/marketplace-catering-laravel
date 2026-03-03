<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Pesanan</h1>
    <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
    <p><strong>Tanggal Antar:</strong> {{ $order->delivery_date }}</p>
    <h3>Menu yang Dipesan</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Qty</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $totalHarga = 0; @endphp
            @foreach ($order->menus as $menu)
                @php
                    $qty = (int) ($menu->pivot->quantity ?? 1);
                    $subtotal = (float) $menu->price * $qty;
                    $totalHarga += $subtotal;
                @endphp
                <tr>
                    <td>{{ $menu->name }}</td>
                    <td>{{ $qty }}</td>
                    <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total Harga:</strong> Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
    <a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali</a>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Buat Invoice</a>
@endsection
