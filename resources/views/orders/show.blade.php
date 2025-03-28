<!-- resources/views/orders/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Pesanan</h1>
    <p><strong>Customer:</strong> {{ $order->customer->name }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($order->total_price) }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <h3>Menu yang Dipesan</h3>
    <ul>
        @foreach ($order->menus as $menu)
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price) }}</li>
        @endforeach
    </ul>
@endsection
