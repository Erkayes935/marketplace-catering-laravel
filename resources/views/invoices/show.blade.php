<!-- resources/views/invoices/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Invoice</h1>
    <p><strong>Nomor Invoice:</strong> {{ $invoice->invoice_number }}</p>
    <p><strong>Customer:</strong> {{ $invoice->order->customer->name }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($invoice->total_price) }}</p>
    <p><strong>Status Pembayaran:</strong> {{ $invoice->payment_status }}</p>

    <h3>Menu yang Dipesan</h3>
    <ul>
        @foreach ($invoice->order->menus as $menu)
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price) }}</li>
        @endforeach
    </ul>

    <h3>Alamat Pengiriman</h3>
    <p>{{ $invoice->order->address }}</p>
@endsection
