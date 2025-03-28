<!-- resources/views/invoices/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Invoice</h1>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Invoice</th>
                <th>Customer</th>
                <th>Total Harga</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->order->customer->name }}</td>
                    <td>Rp {{ number_format($invoice->total_price) }}</td>
                    <td>{{ $invoice->payment_status }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
