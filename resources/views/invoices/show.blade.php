<!-- resources/views/invoices/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Detail Invoice</h1>
    <p><strong>Nomor Invoice:</strong> INV-{{ str_pad((string) $invoice->id, 5, '0', STR_PAD_LEFT) }}</p>
    <p><strong>Customer:</strong> {{ $invoice->order->customer->name }}</p>
    <p><strong>Tanggal Antar:</strong> {{ $invoice->order->delivery_date }}</p>
    <p><strong>Total Harga:</strong> Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</p>

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
            @foreach ($invoice->order->menus as $menu)
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
    <p><strong>Total Hitung Item:</strong> Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>
    <a href="{{ route('invoices.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
