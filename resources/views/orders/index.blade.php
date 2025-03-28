<!-- resources/views/orders/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Pesanan</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Customer</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->customer->name }}</td>
                    <td>Rp {{ number_format($order->total_price) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
