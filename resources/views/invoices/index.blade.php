<!-- resources/views/invoices/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Daftar Invoice</h1>
    <a href="{{ route('invoices.create') }}" class="btn btn-primary">Buat Invoice</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Invoice</th>
                <th>Customer</th>
                <th>Tanggal Antar</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>INV-{{ str_pad((string) $invoice->id, 5, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $invoice->order->customer->name }}</td>
                    <td>{{ $invoice->order->delivery_date }}</td>
                    <td>Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
